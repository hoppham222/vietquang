<?php 
/**
 * Email handler functions.
 */
use Drupal\user\Entity\User;
use Drupal\node\Entity\Node;
use Drupal\Core\Url;

/**
 * Handler for all email messages.
 */
function custom_mail_get_message($key, &$message, $params) {
  switch ($key) {
    // Send HTML email with token.
    case 'html_mail':
      $message['headers']['Content-Type'] = 'text/html; charset=UTF-8; format=flowed';
      $message['headers']['Content-Transfer-Encoding'] = '8Bit';
      $message['from'] = \Drupal::config('system.site')->get('mail');
      
      // Process message with token.
      $token_service = \Drupal::token();
      
      // Replace the token for subject.
      $message['subject'] = $token_service->replace($params['subject'], array('user' => $params['account'], 'node' => $params['node']));
      $message['body'][] = $token_service->replace($params['message'], array('user' => $params['account'], 'node' => $params['node']));
      break;
  }
}

/**
 * Handler email alter.
 */
function custom_mail_alter_message(&$message) {
  switch ($message['id']) {
    case 'user_status_activated':
      // Disable Drupal default email.
      //$message['send'] = FALSE;
      break;
    
    case 'user_register_no_approval_required':
      // Disable Drupal default email.
      //$message['send'] = FALSE;
      break;
  }
}

/**
 * Helper function to send HTML email.
 */
function custom_send_html_email($to, $params) {
  // Init the email sender.
  $mailManager = \Drupal::service('plugin.manager.mail');
  $module = 'custom';
  $key = 'html_mail';
  $langcode = \Drupal::currentUser()->getPreferredLangcode();
  $reply = \Drupal::config('system.site')->get('mail');
  $send = TRUE;
  
  // Sending.
  $mailManager->mail($module, $key, $to, $langcode, $params, $reply, $send);
}

/**
 * Helper function to send plain text email.
 */
function custom_send_text_email($to, $params) {
  // Init the email sender.
  $mailManager = \Drupal::service('plugin.manager.mail');
  $module = 'custom';
  $key = 'text_mail';
  $langcode = \Drupal::currentUser()->getPreferredLangcode();
  $reply = \Drupal::config('system.site')->get('mail');
  $send = TRUE;
  
  // Sending.
  $mailManager->mail($module, $key, $to, $langcode, $params, $reply, $send);
}
