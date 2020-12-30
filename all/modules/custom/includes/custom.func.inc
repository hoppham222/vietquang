<?php /* Custom functions */
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

use Drupal\Core\Breadcrumb\Breadcrumb;
use Drupal\Core\Link;

/**
 * Customize the breadcrumb.
 */
function custom_breadcrumb_modify(&$breadcrumb, $route_match) {
  // Always set a home link.
  $breadcrumb = new Breadcrumb();
  $breadcrumb->addLink(Link::createFromRoute('Trang chủ', '<front>'));

  // Get node / route name.
  $node = \Drupal::request()->get('node');
  $commerce_product = \Drupal::request()->get('commerce_product');
  $route_name = $route_match->getRouteName();
  //kint($route_name);
  
  // For route.
  switch ($route_name) {
    case 'view.node_page_functions.page_tin_tuc':
      $breadcrumb->addLink(Link::createFromRoute('Tin tức', '<nolink>'));
      break;
    
    case 'view.node_page_functions.page_tuyen_dung':
      $breadcrumb->addLink(Link::createFromRoute('Tuyển dụng', '<nolink>'));
      break;
    
    case 'view.product_search_category.page_product_search':
      $current_sort = isset($_GET['sort_bef_combine']) ? $_GET['sort_bef_combine'] : 'created_DESC';
    
      // All product.
      $breadcrumb->addLink(Link::createFromRoute('Tất cả sản phẩm', 'view.product_search_category.page_product_search', array('sort_bef_combine' => $current_sort)));
      
      // Combo.
      if (isset($_GET['field_san_pham_combo']) and $_GET['field_san_pham_combo'] == 1) {
        $breadcrumb->addLink(Link::createFromRoute('Combo ưu đãi', 'view.product_search_category.page_product_search', array('field_san_pham_combo' => 1, 'sort_bef_combine' => $current_sort)));
      }
      
      // Get categories.
      $params = $_GET['f'];
      $term_id = 0;
      if (!empty($params)) {
        $term_id = (int) preg_replace('/^danh_muc_san_pham\:/', '', $params[0]);
      }
      
      if ($term_id) {
        $parents = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadAllParents($term_id);
        foreach (array_reverse($parents, true) as $tid => $term) {
          $breadcrumb->addLink(Link::createFromRoute($term->getName(), 'view.product_search_category.page_product_search', array('sort_bef_combine' => $current_sort, 'f[0]' => 'danh_muc_san_pham:' . $tid)));
        }
      }
      
      break;
    
    case 'commerce_cart.page':
      $breadcrumb->addLink(Link::createFromRoute('Cập nhật báo giá', '<nolink>'));
      break;
    
    case 'commerce_checkout.form':
      $breadcrumb->addLink(Link::createFromRoute('Cập nhật báo giá', 'commerce_cart.page'));
      $breadcrumb->addLink(Link::createFromRoute('Xác nhận & gửi yêu cầu', '<nolink>'));
      break;
    
    case 'entity.user.edit_form':
      $breadcrumb->addLink(Link::createFromRoute('Quản lý tài khoản', '<nolink>'));
      break;
    
    case 'view.commerce_user_orders.order_page':
      $breadcrumb->addLink(Link::createFromRoute('Quản lý tài khoản', 'entity.user.edit_form', array('user' => \Drupal::currentUser()->id())));
      $breadcrumb->addLink(Link::createFromRoute('Lịch sử báo giá', '<nolink>'));
      break;
    
    case 'entity.commerce_order.user_view':
      $breadcrumb->addLink(Link::createFromRoute('Quản lý tài khoản', 'entity.user.edit_form', array('user' => \Drupal::currentUser()->id())));
      $breadcrumb->addLink(Link::createFromRoute('Lịch sử báo giá', 'view.commerce_user_orders.order_page', array('user' => \Drupal::currentUser()->id())));
      $breadcrumb->addLink(Link::createFromRoute('Thông tin báo giá', '<nolink>'));
      break;
  }
  
  // For nodes.
  if ($node) {
    //$type = $node->type->entity->label();
    $type = $node->getType();
    //kint($type);
    
    switch ($type) {
      case 'article':
        $breadcrumb->addLink(Link::createFromRoute('Tin tức', 'view.node_page_functions.page_tin_tuc'));
        break;
      
      case 'tuyen_dung':
        $breadcrumb->addLink(Link::createFromRoute('Tuyển dụng', 'view.node_page_functions.page_tuyen_dung'));
        break;
      
      case 'webform':
        $breadcrumb->addLink(Link::createFromRoute('Liên hệ', '<nolink>'));
        break;
      
      case 'page':
        if ($node->id() == 37) {
          $breadcrumb->addLink(Link::createFromRoute('Giới thiệu', '<nolink>'));
        }
        
        break;
    }
  }
  
  // For products.
  if (is_object($commerce_product)) {
    $current_sort = isset($_GET['sort_bef_combine']) ? $_GET['sort_bef_combine'] : 'created_DESC';
    
    // All product.
    $breadcrumb->addLink(Link::createFromRoute('Tất cả sản phẩm', 'view.product_search_category.page_product_search', array('sort_bef_combine' => $current_sort)));
    
    // Get categories.
    $term_id = $commerce_product->get('field_danh_muc_san_pham')->target_id;
    if ($term_id) {
      $parents = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadAllParents($term_id);
      foreach (array_reverse($parents, true) as $tid => $term) {
        $breadcrumb->addLink(Link::createFromRoute($term->getName(), 'view.product_search_category.page_product_search', array('sort_bef_combine' => $current_sort, 'f[0]' => 'danh_muc_san_pham:' . $tid)));
      }
    }
  }
}

/**
 * Get block of product comments stats.
 */
function custom_product_get_comments_stats($product_id) {
  $result = views_get_view_result('comment_functions', 'block_comments_get_ratings', $product_id);
  $stats = array(
    'total_count' => 0,
    'total_value' => 0,
    'rating_average' => 0,
    'ratings' => array(
      '5' => 0,
      '4' => 0,
      '3' => 0,
      '2' => 0,
      '1' => 0,
    ),
  );
  
  foreach ($result as $row) {
    $rating_value = (int) $row->_entity->get('field_rating')->rating;
    if ($rating_value) {
      // Get total for average calculation later.
      $stats['total_count']++;
      $stats['total_value'] += $rating_value;
      
      // Get group ratings.
      $rating_star = round($rating_value / 20);
      $stats['ratings'][$rating_star]++;
    }
  }
  
  // Get average.
  if ($stats['total_count']) {
    $stats['rating_average'] = round($stats['total_value'] / $stats['total_count'] / 20, 1);
  }
  
  return $stats;
}

/**
 * Helper function to check for all required fields for product node.
 * Return true / false.
 */
function _custom_user_product_fields_validate($node) {
  if (is_numeric($node)) {
    $node = Node::load($node);
  }

  if (!$node or $node->getType() != 'product') {
    return false;
  }
  
  // Check for required fields.
  $title = trim($node->getTitle());
  //$gia = trim($node->get('field_price')->value);
  //$body = trim($node->get('body')->value);
  $images = (int) $node->get('field_images')->target_id;
  
  if ($title == '' or !$images) {
    return false;
  }
  
  return true;
}

/**
 * Alter for user page view.
 */
function custom_user_page_view_modify(&$vars) {
  // Add viewing user id.
  $current_path = \Drupal::service('path.current')->getPath();
  $path_args = explode('/', $current_path);

  $vars['account'] = User::load($path_args[2]);
    
  // Add user avatar (user profile).
  $avatar_id = (int) $vars['account']->get('field_photo')->target_id;
  if ($avatar_id) {
    $file = File::load($avatar_id);
    $vars['account_avatar'] = ImageStyle::load('thumbnail')->buildUrl($file->get('uri')->value);
  }
  else{
    $vars['account_avatar'] = '/sites/default/files/styles/thumbnail/public/default_images/no_photo.png';
  }
    
  // User name and identity.
  $vars['account_name'] = $vars['account']->getUsername();
  if (trim($vars['account']->get('field_full_name')->value) != '') {
    $vars['account_name'] = trim($vars['account']->get('field_full_name')->value);
  }
}

/**
 * Helper function to detect current user is admin or not.
 */
function _custom_is_admin_user() {
  $current_user = \Drupal::currentUser();
  $roles = $current_user->getRoles();
  
  if ($current_user->id() == 1 or in_array('webmaster', $roles)) {
    return true;
  }
  
  return false;
}

/**
 * Convert number to string.
 */
function _custom_number_to_string($number) {
  // Get the number length.
  $number = is_numeric($number) ? $number : 0;
  $strlen = strlen($number);
  
  // Convert to ty, trieu.
	if ($strlen > 9) {
	  return round($number / 1000000000, 2) . ' tỷ';
	}	
	else if ($strlen > 6) {
	  return round($number / 1000000, 2) . ' triệu';
	}
	else if ($number > 0) {
    return number_format($number) . ' đ';
  }
  else{
    return 'Liên hệ';
  }
}
