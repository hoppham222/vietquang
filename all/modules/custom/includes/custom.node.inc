<?php /* Node functions */
use Drupal\node\Entity\Node;
use Drupal\user\Entity\User;
use Drupal\file\Entity\File;

/**
 * Function to create a notification sent to a user.
 */
function custom_node_create_notification($uid, $title, $message) {
  $creator_uid = 1; // Admin user.
  $node = custom_new_node_create($creator_uid, 'notification', $title, 1);
  
  $node->set('field_user', $uid);
  $node->set('body', $message);
  $node->save();
  
  if (!$node->id()) {
    \Drupal::logger('custom')->error(t('Notification FAILED to store.'));
  }
  
  return $node;
}

/**
 * Function to create / update a node.
 */
function custom_node_store($nid, $node_fields) {
  // Flasg to store the node.
  $has_field_stored = false;
  
  // Get the node object.
  if (!$nid) {
    // Create a new node object.
    $type = isset($node_fields['type']) ? $node_fields['type'] : '';
    $title = isset($node_fields['title']) ? trim($node_fields['title']) : t('Unknown title');
    $status = isset($node_fields['status']) ? $node_fields['status'] : 0;
    
    if ($type != '') {
      $node = custom_new_node_create(\Drupal::currentUser()->id(), $type, $title, $status);

      if ($node) {
        $has_field_stored = true;

        // Disable fields so that they won't be stored again.
        if (isset($node_fields['title'])) {
          unset($node_fields['title']);
        }
        if (isset($node_fields['status'])) {
          unset($node_fields['status']);
        }
      }
    }
  }
  else {
    // Load for editting.
    $node = Node::load($nid);
  }
  
  // Check for node object, return error if null.
  if (!$node) {
    return array('is_error' => true, 'message' => t('Node object is invalid.'));
  }
  
  // Disable node type change.
  if (isset($node_fields['type'])) {
    unset($node_fields['type']);
  }
  
  // For each field in the list, check and set value.
  foreach ($node_fields as $field_name => $field_value) {
    if ($node->hasField($field_name)) {
      // To-do: Image, Date field may have different handler.
      
      // Handle for all fields.
      $node->set($field_name, $field_value);
      
      if (!$has_field_stored) {$has_field_stored = true;}
    }
  }
  
  // Return result.
  if ($has_field_stored and $node->save()) {
    return array('is_error' => false, 'message' => t('The content has been stored permanently.'), 'nid' => $node->id());
  }
  else{
    return array('is_error' => true, 'message' => t('Error occured during the content storing process.'));    
  }
}

/**
 * Function to create a base node.
 * $is_stored: true -> will store the node before returning.
 */
function custom_new_node_create($uid, $type, $title, $status, $is_stored = false) {
  $langcode = $current_user->getPreferredLangcode();

  $node = Node::create(array(
    'type' => $type,
    'status' => $status,
    'langcode' => $langcode,
    'uid' => $uid,
    'title' => $title,
  ));

  if ($is_stored) {
    if ($node->save()) {
      //\Drupal::logger('custom')->notice(t('Node stored.'));
      return $node;
    }
    else{
      \Drupal::logger('custom')->error(t('Node FAILED to store.'));
      return null;
    }
  }
  
  return $node;
}
