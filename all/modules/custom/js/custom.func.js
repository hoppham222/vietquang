/* Custom function made by giaidieu.com */

/**
 * Validate commerce checkout form.
 */
function _custom_commerce_checkout_validate(obj) {
  var name = jQuery("#edit-payment-information-billing-information-address-0-address-given-name").val().trim();
  var address = jQuery("#edit-payment-information-billing-information-address-0-address-address-line1").val().trim();
  var province = jQuery("#edit-payment-information-billing-information-address-0-address-administrative-area").val();
  var mobile_number = jQuery("#edit-payment-information-billing-information-field-so-dien-thoai-0-value").val().trim();
  var email = jQuery("#edit-payment-information-billing-information-field-dia-chi-e-mail-0-value").val().trim();
  
  if (name == '') {
    custom_dialog_alert('Thông báo', 'Vui lòng nhập Họ và tên của bạn.');
    return false;
  }

  if (address == '') {
    custom_dialog_alert('Thông báo', 'Vui lòng nhập Địa chỉ đường phố của bạn.');
    return false;
  }

  if (province == '') {
    custom_dialog_alert('Thông báo', 'Vui lòng chọn Tỉnh / Thành phố của bạn.');
    return false;
  }

  // Check for mobile number.
  if (mobile_number == '' || !custom_validate_is_mobile_number(mobile_number)) {
    custom_dialog_alert('Thông báo', 'Vui lòng nhập Số điện thoại hợp lệ của bạn.');
    return false;
  }
  
  // Check for email.
  if (email == '' || !custom_validate_is_email(email)) {
    custom_dialog_alert('Thông báo', 'Vui lòng nhập địa chỉ E-mail hợp lệ của bạn.');
    return false;
  }

  return true;
}

/**
 * Validate webform contact.
 */
function _custom_webform_contact_validate(obj) {
  var name = jQuery(obj).closest('form').find('input[name="name"]').val().trim();
  if (name == '') {
    custom_dialog_alert('Thông báo', 'Vui lòng nhập Họ và tên của bạn.');
    return false;
  }

  // Check for email.
  var email = jQuery(obj).closest('form').find('input[name="email"]').val().trim();
  if (email == '' || !custom_validate_is_email(email)) {
    custom_dialog_alert('Thông báo', 'Vui lòng nhập địa chỉ E-mail hợp lệ của bạn.');
    return false;
  }

  // Check for mobile number.
  var mobile_number = jQuery(obj).closest('form').find('input[name="so_dien_thoai"]').val().replace(/\s+/g, '');
  if (mobile_number == '' || !custom_validate_is_mobile_number(mobile_number)) {
    custom_dialog_alert('Thông báo', 'Vui lòng nhập Số điện thoại hợp lệ của bạn.');
    return false;
  }

  // Check for message.
  var message = jQuery(obj).closest('form').find('textarea[name="message"]').val().trim();
  if (message == '') {
    custom_dialog_alert('Thông báo', 'Vui lòng nhập Nội dung liên hệ của bạn.');
    return false;
  }

  return true;
}

/**
 * Add to cart via Ajax callback.
 */
function custom_commerce_product_add_to_cart(obj) {
  var product_id = parseInt(jQuery(obj).attr('pid'));
  if (!product_id) {return false;}
  
  custom_dialog_confirm('Xác nhận', 'Bạn chắc chắn muốn đưa sản phẩm này vào Báo giá?', 400, 'auto', true, function() {
    // Close the dialog.
    custom_dialog_confirm_close();
    
    jQuery(obj).attr('disabled', true);
    var loading_message = custom_dialog_ajax_loading();
    jQuery.post('/custom/product-add-to-cart/' + product_id, {}, function(result) {
      jQuery(obj).attr('disabled', false);
      loading_message.dialog('close');
      
      if (result['is_error']) {
        custom_dialog_alert('Thông báo', result['message']);
        return false;
      }
      else{
        // Update the cart number.
        var total_quantity = parseInt(result['total_quantity']);
        if (total_quantity) {
          document.location.reload();
          //jQuery('span.amount_product').html(total_quantity).addClass('blink');
          
          // Stay for few seconds.
          //setTimeout(function() {
            //jQuery('span.amount_product').removeClass('blink');
          //}, 3000);
        }
      }
    });
  });
}

/**
 * Toggle show / hide user menu (on header).
 */
function custom_user_account_menu_toggle(obj) {
  var list = jQuery(obj).next();
  if (list.hasClass('hide')) {
    list.hide().removeClass('hide').slideDown();
  }
  else{
    list.slideUp(function() {
      jQuery(this).addClass('hide');
    });
  }
}

/**
 * Load menu and display as a menu slideshow on main menu.
 */
function custom_menu_load_callback(menu, menu_id) {
  jQuery.post('/custom/menu-load/' + menu_id, {}, function(menus) {
    if (jQuery.isEmptyObject(menus)) {
      menu.html('Không tìm thấy danh mục. Vui lòng thử lại sau.');
    }
    else{
      var list = '<ul>';
      for (tid in menus) {
        list += '<li><a href="' + menus[tid]['link'] + '">' + menus[tid]['name'] + '</a></li>';
      }
      list += '</ul>';
      menu.empty().hide().append(list).slideDown();
    }
  });
}

/**
 * Validate function user fields.
 */
function _custom_user_fields_validate(include_password) {
  // Get data.
  var email = jQuery("input#edit-mail").val().trim();
  var password = jQuery("input#edit-pass-pass1").val().trim();
  var password2 = jQuery("input#edit-pass-pass2").val().trim();
  var full_name = jQuery("input#edit-field-full-name-0-value").val().trim();
  
  //var has_gender_field = jQuery("input[name='field_gender']").length;
  //var gender = jQuery("input[name='field_gender']:checked").val();
  //var birthday = jQuery("input#edit-field-birthday-0-value-date");
  
  // Reprocess for phone number.
  var phone_number = jQuery("input#edit-field-mobile-number-0-value").val().trim().replace(/\+|\s+/, '');
  jQuery("input#edit-field-mobile-number-0-value").val(phone_number);

  // Validate all required field.
  if (email == '') {
    custom_dialog_alert('Thông báo', 'Vui lòng nhập địa chỉ E-mail của bạn.');
    return false;
  }
  else if (!custom_validate_is_email(email)) {
    custom_dialog_alert('Thông báo', 'Vui lòng nhập địa chỉ E-mail hợp lệ.');
    return false;    
  }
  
  if (include_password) {
    if (password == '' || password != password2) {
      custom_dialog_alert('Thông báo', 'Mật khẩu chưa nhập hoặc không trùng khớp. Xin vui lòng kiểm tra.');
      return false;        
    }
  }

  if (full_name == '') {
    custom_dialog_alert('Thông báo', 'Vui lòng nhập Họ và tên của bạn.');
    return false;
  }
  
  /*
  if (has_gender_field && (gender == undefined || gender == null)) {
    custom_dialog_alert('Thông báo', 'Vui lòng chọn Giới tính của bạn.');
    return false;
  }

  if (birthday.length && birthday.val().trim() == '') {
    custom_dialog_alert('Thông báo', 'Vui lòng chọn Ngày sinh của bạn.');
    return false;
  }
  */
  
  if (phone_number == '') {
    custom_dialog_alert('Thông báo', 'Vui lòng nhập Số điện thoại di động của bạn.');
    return false;
  }
  else if (!custom_validate_is_mobile_number(phone_number)) {
    custom_dialog_alert('Thông báo', 'Vui lòng nhập Số điện thoại hợp lệ.');
    return false;
  }

  return true;
}

/**
 * Subscribe email address to Simplenews.
 */
function custom_newsletter_subscribe(obj) {
  var newsletter = jQuery(obj).parent().find('input[name="newsletter"]');
  var email = newsletter.val().trim();
  if (!custom_validate_is_email(email)) {
    custom_dialog_alert('Thông báo', 'Vui lòng nhập một Địa chỉ e-mail hợp lệ của bạn.');
    return false;
  }
  
  // Subscribe the email to server for further check -> submit if passed.
  jQuery(obj).addClass('disabled');
  var loading_message = custom_dialog_ajax_loading();
  jQuery.post('/user-newsletter-subscribe', {'email': email}, function(result) {
    jQuery(obj).removeClass('disabled');
    loading_message.dialog('close');
    
    if (result['is_error']) {
      custom_dialog_alert('Thông báo', result['message']);
      return false;
    }
    
    // Done, reset the field.
    custom_dialog_alert('Thông báo', result['message']);
    newsletter.val('');
  });
}

/**
 * Update user avatar via ajax callback.
 */
function custom_user_avatar_update(obj) {
  var uid = parseInt(jQuery("#user-avatar").attr('uid'));
  var fid = parseInt(jQuery("#user-avatar").attr('fid'));
  
  if (!uid || !fid) {
    return false;
  }
  
  // Confirm before process.
  custom_dialog_confirm('Xác nhận', 'Bạn chắc chắn muốn sử dụng ảnh này làm đại diện?<br />Lưu ý: Thao tác sẽ không thể đảo ngược.', 400, 'auto', true, function() {
    // Close the confirm.
    custom_dialog_confirm_close();
    
    // Send request to update user avatar.
    var params = {
      'uid': uid,
      'account_fields': {
        'field_photo': fid
      }
    };
  
    var loading_message = custom_dialog_ajax_loading();
    jQuery.post('/user-store', params, function(result) {
      loading_message.dialog('close');
    
      if (result['is_error']) {
        custom_dialog_alert('Thông báo', result['message']);
      }
      else{
        custom_dialog_alert('Thông báo', 'Ảnh của bạn đã được cập nhật thành công.<br />Xin cám ơn!');
      
        // Hide the "Save" button.
        jQuery("#user-avatar-op span.user-avatar-save").addClass('hide');
      }
    });
  });
}

/**
 * Trigger the user avatar section on/off.
 */
function custom_user_avatar_mouseover(obj) {
  if (jQuery("#user-avatar-op").is(':hidden')) {
    jQuery("#user-avatar-op").hide().removeClass('hide').slideDown();
  }
}

/**
 * Trigger the user avatar section on/off.
 */
function custom_user_avatar_mouseout(obj) {
  jQuery("#user-avatar-op").slideUp(function() {
    jQuery(this).addClass('hide');
  });
}

/**
 * User avatar process handler.
 */
function custom_user_avatar_handler(file_id) {
  custom_user_avatar_file_browse_process(file_id, function(obj) {
    var user_avatar = jQuery("#user-avatar");
    
    // Add new image to replace current one.
    user_avatar.attr('src', obj.attr('src'));
    user_avatar.attr('fid', obj.attr('fid'));
    
    // Turn on "Save" button.
    jQuery("#user-avatar-op span.user-avatar-save").removeClass('hide');
    jQuery("#user-avatar-op").hide().removeClass('hide').slideDown();
  });
}

/**
 * Auto format number then convert it to text to be displayed.
 */
function custom_auto_format_price_value(obj) {
  // Format the number.
  custom_thousand_format_auto(obj);
  
  // Conver to text.
  var number = jQuery(obj).val().replace(/\,/g, '');
  var text = custom_number_to_text(number);
  
  jQuery(obj).closest('div.form-wrapper').next('div.custom-price-string').find('span.price').html(text);
}

/**
 * Smart login a user via username, email or phone number.
 */
function custom_user_smart_login(obj) {
  // Get values.
  var username = jQuery(obj).parent().find('input[name="username"]').val().trim();
  var password = jQuery(obj).parent().find('input[name="password"]').val().trim();
  
  if (username == '') {
    custom_dialog_alert('Thông báo', 'Vui lòng điền Tên truy nhập, E-mail hoặc Số điện thoại của bạn.');
    return false;    
  }

  if (password == '') {
    custom_dialog_alert('Thông báo', 'Vui lòng nhập Mật khẩu của bạn.');
    return false;    
  }
  
  // Send to server for authentication.
  jQuery(obj).attr('disabled', true);
  var loading_message = custom_dialog_ajax_loading();
  jQuery.post('/user-smart-login', {'username': username, 'password': password}, function(result) {
    jQuery(obj).attr('disabled', false);
    loading_message.dialog('close');
    
    if (result['is_error']) {
      custom_dialog_alert('Thông báo', result['message']);
      return false;
    }
    
    // Close the popup.
    custom_dialog_html_close();
    
    // Redirect to user dashboard.
    custom_dialog_alert('Thông báo', result['message'], function() {
      document.location.href = '/user/' + result['uid'] + '/edit';
    });
  });
}

/**
 * User login popup.
 */
function custom_user_login_popup() {
  var loading_message = custom_dialog_ajax_loading();
  jQuery.get('/user-login-form-popup', {}, function(result) {
    loading_message.dialog('close');
    custom_dialog_html('Đăng nhập', result, 400, 'auto');
  });
}

/**
 * Toggle the section show / hide.
 */
function custom_section_toggle(obj) {
  // Toggle collapsed.
  if (jQuery(obj).hasClass('collapsed')) {
    jQuery(obj).removeClass('collapsed').addClass('expanded');
    jQuery(obj).next().hide().removeClass('hide').slideDown();
  }
  else{
    jQuery(obj).removeClass('expanded').addClass('collapsed');
    jQuery(obj).next().addClass('hide');
  }
}
