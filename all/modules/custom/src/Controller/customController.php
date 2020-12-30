<?php 
namespace Drupal\custom\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Drupal\Core\Url;
use Drupal\image\Entity\ImageStyle;
use Drupal\node\Entity\Node;
use Drupal\user\Entity\User;
use Drupal\taxonomy\Entity\Term;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Drupal\file\Entity\File;
use Drupal\block\Entity\Block;
use Drupal\uc_order\Entity\Order;
use Drupal\Core\Extension\ThemeHandler;

use Drupal\commerce\commerce_product;
use Drupal\commerce;
use Drupal\commerce_cart;

class customController extends ControllerBase {
  /**
   * Test page.
   */
  public function custom_test() {
    // Take over admin login.
    //$user = Drupal\user\Entity\User::load(1);  
    //user_login_finalize($user);

    return array('#markup' => 'Test');
  }
  
  /**
   * Add to cart via ajax callback.
   */
  public function custom_commerce_product_add_to_cart_callback($product_id) {
    // Double check.
    $product_id = (int) $product_id;
    if (!$product_id) {die('Invalid data.');}
    
    // Set default values.
    $store_id = 1;
    $order_type = 'default';

    $entity_manager = \Drupal::entityTypeManager();
    $cart_manager = \Drupal::service('commerce_cart.cart_manager');
    $cart_provider = \Drupal::service('commerce_cart.cart_provider');

    // Get store.
    $store = $entity_manager->getStorage('commerce_store')->load($store_id); 

    // Get product variation.
    //$product_id = 83;
    $product = $entity_manager->getStorage('commerce_product')->load($product_id);
 
    $product_variation_id = $product->get('variations')->getValue()[0]['target_id'];
    $product_variation = $entity_manager->getStorage('commerce_product_variation')->load($product_variation_id);

    // Get the cart.
    $cart = $cart_provider->getCart($order_type, $store);
    if (!$cart) {
      $cart = $cart_provider->createCart($order_type, $store);
    }

    // Add to cart.
    $order_item = $cart_manager->addEntity($cart, $product_variation);
    if (!$order_item) {
      return new JsonResponse(array('is_error' => true, 'message' => 'Không đưa được sản phẩm vào Báo giá. Vui lòng liên hệ để được trợ giúp.'));
    }
    
    // Count new quantity and return.
    $total_quantity_items = 0;
    foreach ($cart->getItems() as $order_item) {
      $total_quantity_items += (int) $order_item->get('quantity')->value;
    }
    
    
    return new JsonResponse(array('is_error' => false, 'message' => '', 'total_quantity' => $total_quantity_items));
  }
  
  /**
   * Load and return the menu items by parent.
   */
  public function custom_menu_load_callback($tid) {
    $menus = array();
    
    $tid = (int) $tid;
    if (!$tid) {
      // Load level 1 category.
      $result = views_get_view_result('taxonomy_functions', 'block_product_category');
      foreach ($result as $row) {
        $menus[$row->tid] = array(
          'name' => $row->_entity->getName(),
          'link' => \Drupal::service('path.alias_manager')->getAliasByPath('/taxonomy/term/' . $row->tid),
        );
      }
    }
    else{
      // Load sub-level of category.
      $result = views_get_view_result('taxonomy_functions', 'block_terms_by_parent', $tid);
      foreach ($result as $row) {
        $menus[$row->tid] = array(
          'name' => $row->_entity->getName(),
          'link' => \Drupal::service('path.alias_manager')->getAliasByPath('/taxonomy/term/' . $row->tid),
        );
      }      
    }
    
    return new JsonResponse($menus);
  }
  
  /**
   * User smart login callback.
   * $user = User::load($uid);
   * user_login_finalize($user);
   */
  public function custom_user_smart_login_callback() {
    module_load_include('inc', 'custom', 'includes/custom.user');

    // Get data and validate.
    $username = trim(\Drupal::request()->request->get('username'));
    $password = trim(\Drupal::request()->request->get('password'));
    
    if ($username == '' or $password == '') {
      return new JsonResponse(array('is_error' => true, 'message' => 'Bạn chưa điền đầy đủ thông tin cần thiết để đăng nhập.'));
    }
    
    $result = custom_user_smart_login($username, $password);
    return new JsonResponse($result);
  }
  
  /**
   * Return a user login form html for popup showing.
   */
  public function custom_user_login_form_popup_callback() {
    $theme = array('#theme' => 'custom__user_form_login');
    $html = drupal_render($theme);
    
    return new JsonResponse($html);
  }
  
  /**
   * Check and subscribe e-mail to Simplenews list.
   */
  public function custom_user_newsletter_subscribe_callback() {
    // Get data and validate.
    $email = trim(\Drupal::request()->request->get('email'));
    if ($email == '' or !filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return new JsonResponse(array('is_error' => true, 'message' => 'Vui lòng nhập một Địa chỉ e-mail hợp lệ của bạn.'));
    }
    
    // Check for exist in the list.
    $email = strtolower($email);
    $subscription_manager = \Drupal::service('simplenews.subscription_manager');
    $email_list_id = 'default';
    
    if ($subscription_manager->isSubscribed($email, $email_list_id)) {
      return new JsonResponse(array('is_error' => true, 'message' => 'Địa chỉ e-mail này đã được sử dụng đăng ký trước đây rồi. Bạn không cần thực hiện lại.'));
    }
    
    // Subscribe.
    // subscribe($mail, $newsletter_id, $confirm = NULL, $source = unknown, $preferred_langcode = NULL).
    $subscription_manager->subscribe($email, $email_list_id, false);
    return new JsonResponse(array('is_error' => false, 'message' => 'Địa chỉ e-mail của bạn đã được đăng ký thành công. Xin chân thành cám ơn!'));
  }
  
  /**
   * Update user fields via ajax request.
   * $params = array('uid' => id, $account_fields => array());
   */
  public function custom_user_store_callback() {
    // Get current user account.
    $uid = (int) \Drupal::request()->request->get('uid');
    $account_fields = \Drupal::request()->request->get('account_fields');
    
    // Validate input.
    if (!$uid or $uid != \Drupal::currentUser()->id()) {
      return new JsonResponse(array('is_error' => true, 'message' => 'Bạn không có quyền truy cập tài khoản này.'));      
    }
    
    if (empty($account_fields)) {
      return new JsonResponse(array('is_error' => true, 'message' => 'Không tìm thấy nội dung cần cập nhật.'));
    }
    
    // Store the field update.
    module_load_include('inc', 'custom', 'includes/custom.user');
    $result = custom_user_store($uid, $account_fields);
    
    return new JsonResponse($result);
  }
  
  /**
   * Custom photo upload callback.
   */
  public function custom_photo_upload_callback() {
    // Process to upload the file.
    module_load_include('inc', 'custom', 'includes/custom.media');
    $file = custom_photo_upload();
    $file_json = array();
    
    // Create file URL and return.
    if (is_object($file)) {
      // Get image style name.
      $image_style_name = isset($_POST['image_style']) ? trim($_POST['image_style']) : 'thumbnail';
      $image_style = ImageStyle::load($image_style_name);
      if (!$image_style) {
        drupal_set_message(t('Image style %image_style does not exist.', array('%image_style' => $image_style_name)), 'error');
        $image_style = ImageStyle::load('thumbnail');
      }
      
      $file_json = array(
        'fid' => $file->id(),
        'filename' => $file->getFilename(),
        'url' => $image_style->buildUrl($file->get('uri')->value),
      );
    }

    return new JsonResponse($file_json);
  }

  /**
   * User register form popup callback.
   */
  /*
  public function custom_user_register_popup_callback() {
    // Build and return the register form.
    $entity = \Drupal::entityTypeManager()->getStorage('user')->create(array());
    $formObject = \Drupal::entityTypeManager()->getFormObject('user', 'register')->setEntity($entity);

    $form = \Drupal::formBuilder()->getForm($formObject);
    $response = \Drupal::service('renderer')->render($form);    
    
    return new JsonResponse($response);    
  }
  */
  
  /**
   * User login form popup callback.
   */
  /*
  public function custom_user_login_popup_callback() {
    // Build and return the login form.
    $form = \Drupal::formBuilder()->getForm('Drupal\user\Form\UserLoginForm');
    $response = \Drupal::service('renderer')->renderPlain($form);
    
    return new JsonResponse($response);
  }
  */
  
  /**
   * Home page.
   */
  public function custom_home_callback() {
    return array('#markup' => '');
  }
}