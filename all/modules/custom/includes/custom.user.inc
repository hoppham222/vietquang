<?php /* User functions */
use Drupal\node\Entity\Node;
use Drupal\user\Entity\User;
use Drupal\file\Entity\File;

/**
 * Allow user to login via username, email, or mobile number.
 */
function custom_user_smart_login($username, $password) {
  // Authenticate the 'username' which can be name, email or phone.
  $username = strtolower($username);

  // Check with username.
  $account = \Drupal::entityTypeManager()->getStorage('user')->loadByProperties(['name' => $username]);
  if (!empty($account)) {
    $account = reset($account);
    $uid = \Drupal::service('user.auth')->authenticate($account->getUsername(), $password);
      
    if ($uid) {
      user_login_finalize($account);
      return array('is_error' => false, 'message' => 'Bạn đã đăng nhập thành công bằng Tên truy nhập. Nhấn "Đồng ý" để tiếp tục.', 'uid' => $uid);
    }
  }

  // Check with email.
  if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
    $account = \Drupal::entityTypeManager()->getStorage('user')->loadByProperties(['mail' => $username]);
    if (!empty($account)) {
      $account = reset($account);
      $uid = \Drupal::service('user.auth')->authenticate($account->getUsername(), $password);
      
      if ($uid) {
        user_login_finalize($account);
        return array('is_error' => false, 'message' => 'Bạn đã đăng nhập thành công bằng địa chỉ E-mail. Nhấn "Đồng ý" để tiếp tục.', 'uid' => $uid);
      }
    }
  }
        
  // Not working -> try as phone number.
  if (is_numeric($username)) {
    $account = \Drupal::entityTypeManager()->getStorage('user')->loadByProperties(['field_mobile_number' => $username]);
    if (!empty($account)) {
      $account = reset($account);
      $uid = \Drupal::service('user.auth')->authenticate($account->getUsername(), $password);
      
      if ($uid) {
        user_login_finalize($account);
        return array('is_error' => false, 'message' => 'Bạn đã đăng nhập thành công bằng Số điện thoại. Nhấn "Đồng ý" để tiếp tục.', 'uid' => $uid);
      }
    }
  }
    
  return array('is_error' => true, 'message' => 'Thông tin đăng nhập không đúng. Xin vui lòng kiểm tra rồi thử lại!');
}

/**
 * Helper function to check whether a username does exist.
 */
function _custom_user_does_exist($username) {
  $account = \Drupal::entityTypeManager()->getStorage('user')->loadByProperties(['name' => $username]);
  if (!empty($account)) {
    $account = reset($account);
    if (\Drupal::currentUser()->id() != $account->id()) {
      return true;
    }
  }
  
  return false;
}

/**
 * Helper function to check whether a email does exist.
 */
function _custom_mail_does_exist($email) {
  $account = \Drupal::entityTypeManager()->getStorage('user')->loadByProperties(['mail' => $email]);
  if (!empty($account)) {
    $account = reset($account);
    if (\Drupal::currentUser()->id() != $account->id()) {
      return true;
    }
  }
  
  return false;  
}

/**
 * Helper function to check for a field value (phone number) does exist.
 */
function _custom_field_does_exist($field_name, $field_value) {
  $account = \Drupal::entityTypeManager()->getStorage('user')->loadByProperties([$field_name => $field_value]);
  if (!empty($account)) {
    $account = reset($account);
    if (\Drupal::currentUser()->id() != $account->id()) {
      return true;
    }
  }
  
  return false;    
}

/**
 * Function to create / update a user account.
 */
function custom_user_store($uid, $account_fields) {
  // Flag to store the account.
  $has_field_stored = false;
  
  // Lower these 2 specific fields.
  if (isset($account_fields['name'])) {
    $account_fields['name'] = strtolower(trim($account_fields['name']));
  }
  if (isset($account_fields['email'])) {
    $account_fields['email'] = strtolower(trim($account_fields['email']));
  }
  
  // Get the account object.
  if (!$uid) {
    // Create a new user object.
    $name = isset($account_fields['name']) ? $account_fields['name'] : ''; // username.
    $pass = isset($account_fields['pass']) ? $account_fields['pass'] : user_password(8);
    $email = isset($account_fields['email']) ? $account_fields['email'] : '';
    $status = isset($account_fields['status']) ? $account_fields['status'] : 0;
    $rids = isset($account_fields['rids']) ? $account_fields['rids'] : array();
    
    if ($name != '' and $email != '') {
      // Validate username / email existed.
      if (_custom_user_does_exist($name)) {
        return array('is_error' => true, 'message' => t('Username does exist.'));
      }

      if (_custom_mail_does_exist($email)) {
        return array('is_error' => true, 'message' => t('E-mail does exist.'));
      }
      
      $account = custom_user_create($name, $pass, $email, $status, $rids);
      if ($account) {
        $has_field_stored = true;
        
        // Disable fields so that they won't be stored again.
        if (isset($account_fields['name'])) {
          unset($account_fields['name']);
        }
        if (isset($account_fields['pass'])) {
          unset($account_fields['pass']);
        }
        if (isset($account_fields['email'])) {
          unset($account_fields['email']);
        }
        if (isset($account_fields['status'])) {
          unset($account_fields['status']);
        }
        if (isset($account_fields['rids'])) {
          unset($account_fields['rids']);
        }
      }
    }
  }
  else {
    // Load for editting.
    $account = User::load($uid);
    if (!$account) {
      return array('is_error' => true, 'message' => t('Account object is not found.'));
    }
    
    // Validate username / email existed if changed.
    if (isset($account_fields['name']) and $account->getUsername() != $account_fields['name']) {
      if (_custom_user_does_exist($account_fields['name'])) {
        return array('is_error' => true, 'message' => t('New username does exist.'));
      }
    }
    
    if (isset($account_fields['email']) and $account->getEmail() != $account_fields['email']) {
      if (_custom_mail_does_exist($account_fields['email'])) {
        return array('is_error' => true, 'message' => t('New e-mail does exist.'));
      }
    }
  }
  
  // Check for account object, return error if null.
  if (!$account) {
    return array('is_error' => true, 'message' => t('Account object is invalid.'));
  }
  
  // For each field in the list, check and set value.
  foreach ($account_fields as $field_name => $field_value) {
    // Core fields.
    if (in_array($field_name, array('name', 'email', 'pass'))) {
      switch ($field_name) {
        case 'name':
          $account->setUsername($name);
          break;

        case 'email':
          $account->setEmail($name);
          break;

        case 'pass':
          $account->setPassword($name);
          break;
      }
      
      if (!$has_field_stored) {$has_field_stored = true;}
      continue;
    }

    // Custom fields.
    if ($account->hasField($field_name)) {
      // To-do: Image, Date field may have different handler.
      // Handle for field_photo.
      if ($field_name == 'field_photo' and is_numeric($field_value)) {
        $file = File::load($field_value);
        if ($file) {
          // Change status if not.
          $file->set('status', 1);
          
          // Move file to new location.
          if (preg_match('/file\-dropzone\-temp/', $file->uri->value)) {
            $destination = 'public://photos/' . \Drupal::service('date.formatter')->format(time(), 'custom', 'Y') . '-' . \Drupal::service('date.formatter')->format(time(), 'custom', 'm');
            if (!file_prepare_directory($destination, FILE_CREATE_DIRECTORY)) {
              \Drupal::logger('custom')->error(t('Could not find folder %folder', array('%folder' => $destination)));
            }
      
            $file = file_move($file, $destination, FILE_EXISTS_RENAME);
            if (!$file) {
              \Drupal::logger('custom')->error(t('Could not move file to folder %folder', array('%folder' => $destination)));
            }
          }
          else{
            $file->save();
          }
        }
      }
      
      // Handle for all other fields.
      $account->set($field_name, $field_value);
      
      if (!$has_field_stored) {$has_field_stored = true;}
    }
  }
  
  // Return result.
  if ($has_field_stored and $account->save()) {
    return array('is_error' => false, 'message' => t('The account has been stored permanently.'), 'uid' => $account->id());
  }
  else{
    return array('is_error' => true, 'message' => t('Error occured during the account storing process.'));    
  }

}

/**
 * Create a new user.
 */
function custom_user_create($name, $pass, $email, $status, $rids = array(), $is_stored = false) {
  // Init the account.
  $language = \Drupal::languageManager()->getCurrentLanguage()->getId();
  $account = User::create();
          
  // Mandatory.
  $account->enforceIsNew();
  $account->setPassword($pass);
  $account->setUsername($name);
  $account->setEmail($email);
  
  // Optional.
  $account->set('init', $email);
  $account->set('langcode', $language);
  
  // User account status.
  $account->set('status', $status);

  // Add role if any.
  if (!empty($rids)) {
    foreach ($rids as $rid) {
      $account->addRole($rid);
    }
  }
  
  if ($is_stored) {
    if ($account->save()) {
      //\Drupal::logger('custom')->notice(t('Account stored.'));
      return $account;
    }
    else{
      \Drupal::logger('custom')->error(t('Account FAILED to store.'));
      return null;
    }
  }
  
  return $account;
}
