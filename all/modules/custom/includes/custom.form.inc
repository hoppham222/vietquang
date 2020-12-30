<?php /* Custom form functions */
use Drupal\Core\Entity\Display\EntityViewDisplayInterface;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\Core\Url;
use Drupal\image\Entity\ImageStyle;
use Drupal\node\Entity\Node;
use Drupal\user\Entity\User;
use Drupal\taxonomy\Entity\Term;
use Drupal\comment\Entity\Comment;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Drupal\file\Entity\File;
use Drupal\Core\Render\Element\PasswordConfirm;

/**
 * Modify checkout flow form.
 */
function custom_commerce_checkout_form_modify(&$form) {
  $form['#attached']['library'][] = 'custom/custom_mobilevn';
  $form['actions']['next']['#attributes']['onclick'] = 'return _custom_commerce_checkout_validate(this);';
  $form['payment_information']['billing_information']['field_so_dien_thoai']['widget'][0]['value']['#attributes']['onkeyup'] = 'custom_number_phone_format_auto(this);';
  
  // Auto fill if user is logged in.
  $uid = \Drupal::currentUser()->id();
  if ($uid) {
    $account = User::load($uid);
    $form['payment_information']['billing_information']['address']['widget'][0]['address']['#default_value']['address_line1'] = $account->get('field_address')->value;
    $form['payment_information']['billing_information']['address']['widget'][0]['address']['#default_value']['given_name'] = $account->get('field_full_name')->value;
    $form['payment_information']['billing_information']['field_so_dien_thoai']['widget'][0]['value']['#default_value'] = $account->get('field_mobile_number')->value;
    $form['payment_information']['billing_information']['field_dia_chi_e_mail']['widget'][0]['value']['#default_value'] = $account->get('mail')->value;
  }

  //kint($form['payment_information']['billing_information']);
}

/**
 * Modify user login form.
 */
function custom_user_login_form_modify(&$form) {
  // kint($form);
  // Add social login links.
  $form['actions']['submit']['#prefix'] = '<p class="custom-pass-link"><a href="/user/password">Quên mật khẩu?</a></p>';
  $form['actions']['submit']['#suffix'] = '<p class="custom-or">Hoặc</p><p class="custom-social-link facebook"><a class="btn btn-fb" href="/user/login/facebook">Đăng nhập bằng Facebook</a></p><p class="custom-social-link google"><a class="btn btn-google" href="/user/login/google">Đăng nhập bằng Google</a></p><p class="custom-register-link">Bạn chưa có tài khoản? <a href="/user/register">Đăng ký ngay</a></p>';
}

/**
 * Modify user register form.
 */
function custom_user_register_form_modify(&$form){
  // Change date format and limitation.
  $form['#prefix'] = '<h1 class="page-title">Đăng ký tài khoản</h1>';

  // Change some field labels.
  $form['field_full_name']['widget'][0]['value']['#attributes']['placeholder'] = 'Họ và tên của bạn. Ví dụ: Nguyễn Văn A';
  $form['field_mobile_number']['widget'][0]['value']['#attributes']['placeholder'] = 'Số di động của bạn';
  $form['field_mobile_number']['widget'][0]['value']['#attributes'] = array('onkeyup' => 'custom_number_phone_format_auto(this);');
  
  $form['account']['mail']['#attributes']['placeholder'] = 'Email đăng ký';
  
  // Add js validate function for required fields and phone number.
  $form['#attached']['library'][] = 'custom/custom_mobilevn';
  $form['actions']['submit']['#value'] = 'Tạo tài khoản';
  $form['actions']['submit']['#attributes'] = array('onclick' => 'return _custom_user_fields_validate(true);');
  
  // Add validate function to check for user phone number unique.
  $form['actions']['submit']['#validate'][] = '_custom_user_register_validate';  
}

/**
 * Modify user edit form.
 */
function custom_user_edit_form_modify(&$form) {
  // Change date format and limitation.
  $form["field_birthday"]["widget"][0]['value']['#attributes']['min'] = \Drupal::service('date.formatter')->format(strtotime('-100 years'), 'custom', 'Y-m-d');
  $form["field_birthday"]["widget"][0]['value']['#attributes']['max'] = \Drupal::service('date.formatter')->format(strtotime('-16 years'), 'custom', 'Y-m-d');
  
  $form['field_mobile_number']['widget'][0]['value']['#attributes'] = array('onkeyup' => 'custom_number_phone_format_auto(this);');

  // Add js validate function for required fields and phone number.
  $form['#attached']['library'][] = 'custom/custom_mobilevn';
  $form['actions']['submit']['#value'] = 'Cập nhật';
  $form['actions']['submit']['#attributes'] = array('onclick' => 'return _custom_user_fields_validate(false);');

  // Add validate function to check for user phone number unique.
  $form['actions']['submit']['#validate'][] = '_custom_user_register_validate';    
}

/**
 * Modiy user pass form.
 */
function custom_user_pass_form_modify(&$form){
  $form['#prefix'] = '<h1 class="page-title">Yêu cầu mật khẩu mới</h1>';
  $form['name']['#title'] = 'Địa chỉ e-mail';
  $form['name']['#attributes']['placeholder'] = 'Nhập E-mail đã đăng ký của bạn';
}

/**
 * Modify node product (BDS) form.
 */
function custom_node_product_form_modify(&$form, \Drupal\Core\Form\FormStateInterface $form_state) {
  // Get the node.
  $node = $form_state->getFormObject()->getEntity();
  module_load_include('inc', 'custom', 'includes/custom.func');

  // Add suffix for Price field.
  $price = 0;
  if ($node->get('field_price')->value) {
    $price = (int) preg_replace('/\,/', '', trim($node->get('field_price')->value));
  }
    
  $form['field_price']['#suffix'] = '<div class="custom-price-string"> = <span class="price value">' . custom_number_to_string($price) .'</span></div>';
  $form['field_price']['widget'][0]['value']['#attributes'] = array('onkeyup' => 'custom_auto_format_price_value(this);');
  
  // Add multiple images dropzone field.
  $node_images = array();
  $node_image_fids = array();
  
  if ($node->id()) {
    $images = $node->get('field_images');
    foreach ($images as $index => $value) {
      if (is_null($value->target_id)) {continue;}
        
      $file = File::load($value->target_id);
      if ($file) {
        $node_images[] = array(
          'fid' => $file->id(),
          'url' => ImageStyle::load('image_190x140')->buildUrl($file->get('uri')->value),
        );
        
        $node_image_fids[] = $file->id();
      }
    }
  }
  
  $file_dropzone = array(
    '#theme' => 'custom__fileupload_drop_area',
    '#images' => $node_images,
  );
  
  $form['file_dropzone'] = array(
    '#type' => 'item',
    '#markup' => drupal_render($file_dropzone),
    '#weight' => $form['field_map']['#weight'] + 1,
  );
  
  $form['custom_files_list'] = array(
    '#type' => 'hidden',
    '#value' => join(',', $node_image_fids),
    '#attributes' => array('id' => 'custom-files-list'),
  );
  
  // Fix editor issue.
  $form['body']['widget'][0]['#format'] = 'editor';
  //kint($form['body']);
  
  // Add submit handler.
  $form['actions']['submit']['#validate'][] = '_custom_product_validate';  
  $form['actions']['submit']['#submit'][] = '_custom_product_submit';
  $form['actions']['submit']['#value'] = 'Lưu sản phẩm';
  $form['actions']['submit']['#attributes'] = array('onclick' => 'return _custom_product_node_fields_validate(true, true);');
  
  $form['field_images']['#access'] = false;
  $form['revision_log']['#access'] = false;
  $form['revision_information']['#access'] = false;
  $form['revision']['#access'] = false;
}

/**
 * Helper function to validate user form.
 */
function _custom_user_register_validate($form, FormStateInterface $form_state) {
  // Get user input.
  $input = $form_state->getUserInput();
  
  // Get the user.
  $edit_user = $form_state->getFormObject()->getEntity();

  // Make sure email is unique.
  $email = trim($input['mail']);
  if ($email != '') {
    $account = \Drupal::entityTypeManager()->getStorage('user')->loadByProperties(['mail' => $email]);
    if (!empty($account)) {
      $account = reset($account);
      if ($account->id() != $edit_user->id()) {
        $form_state->setErrorByName('mail', 'Địa chỉ e-mail đã được sử dụng bởi người khác rồi. Xin vui lòng kiểm tra.');
      }
    }
  }

  // Make sure phone numer is unique.
  $phone_number = trim($input['field_mobile_number'][0]['value']);
  if ($phone_number != '') {
    $account = \Drupal::entityTypeManager()->getStorage('user')->loadByProperties(['field_mobile_number' => $phone_number]);
    if (!empty($account)) {
      $account = reset($account);
      if ($account->id() != $edit_user->id()) {
        $form_state->setErrorByName('field_mobile_number', 'Số điện thoại đã được sử dụng bởi người khác rồi. Xin vui lòng kiểm tra.');
      }
    }
  }
  
  $form_state->setTemporaryValue('entity_validated', TRUE);
}

/**
 * Handler the product validate form.
 */
function _custom_product_validate($form, FormStateInterface $form_state) {
  // Get user input.
  $input = $form_state->getUserInput();
  
  // Image input.
  $files_list = trim($input['custom_files_list']);
  if ($files_list == '') {
    $form_state->setErrorByName('file_dropzone', 'Xin vui lòng tải lên ít nhất 1 file hình ảnh.');
  }
  
  $form_state->setTemporaryValue('entity_validated', TRUE);
}

/**
 * Handler the product submit form.
 */
function _custom_product_submit($form, FormStateInterface $form_state) {
  module_load_include('inc', 'custom', 'includes/custom.func');
  module_load_include('inc', 'custom', 'includes/custom.node');

  // Get user input.
  $input = $form_state->getUserInput();
    
  // Get the node entity.
  $node = $form_state->getFormObject()->getEntity();
  
  // Add file list to product images list.
  $files_list = trim($input['custom_files_list']);
  $fids = preg_split('/\,/', $files_list);
  _custom_product_images_submit_process($node, $fids);
  
  // Update khoang gia, khoangr dien tich.
  //_custom_product_ranges_update($input, $node);
}

/**
 * Helper function to process for multiple images submit.
 */
function _custom_product_images_submit_process($node, $fids) {
  $index = 0;

  foreach ($fids as $fid) {
    $file = File::load($fid);
    if ($file) {
      // Turn to permanent.
      $file->set('status', 1);
      
      // Move file to new location.
      if (preg_match('/file\-dropzone\-temp/', $file->uri->value)) {
        $destination = 'public://products/' . \Drupal::service('date.formatter')->format(time(), 'custom', 'Y') . '-' . \Drupal::service('date.formatter')->format(time(), 'custom', 'm');
        if (!file_prepare_directory($destination, FILE_CREATE_DIRECTORY)) {
          watchdog('custom', t('Could not find folder %folder', array('%folder' => $destination)));
        }
      
        $file = file_move($file, $destination, FILE_EXISTS_RENAME);
        if (!$file) {
          watchdog('custom', t('Could not move file to folder %folder', array('%folder' => $destination)));
        }
      }
      else{
        $file->save();
      }
      
      if ($node->id() and $file->id()) {
        if ($index == 0) {
          $node->set('field_images', $file->id());
        }
        else{
          $node->get('field_images')->appendItem(array('target_id' => $file->id()));
        }
        
        $index++;
      }
    }
  }
  
  // No images, empty.
  if (!$index) {
    $node->set('field_images', null);
  }

  // Save the changes in node (workaround).
  if ($node->id()) {
    $node->save();
  }
}

/**
 * Account settings form modification.
 */
function custom_user_admin_settings_modify(&$form) {
  // Hide some items if not admin.
  if (\Drupal::currentUser()->id() != 1) {
    $form['admin_role']['#access'] = false;
    $form['registration_cancellation']['#access'] = false;
    $form['mail_notification_address']['#access'] = false;
    $form['anonymous_settings']['#access'] = false;
  }
}
