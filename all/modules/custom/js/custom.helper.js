/* Helper function to be used globally - made by giaidieu.com */

/**
 * Get document.location.href string params.
 */
function custom_query_params_get() {
  var query = document.location.href.split(/\?/);
  var query_params = {};
                            
  if (query[1] != undefined && query[1] != '') {
    query = query[1].split(/\&/);
                              
    for (var i = 0; i < query.length; i++) {
      var params = query[i].split(/\=/);
      query_params[params[0]] = params[1];
    }
  }
  
  return query_params;
}

/**
 * Set a value to localStorage.
 */
function custom_variable_set(name, value) {
  if (localStorage != undefined) {
    localStorage.setItem(name, value);
  }
}

/**
 * Get a value from localStorage.
 */
function custom_variable_get(name, type) {
  if (localStorage != undefined) {
    var value = localStorage.getItem(name);
    
    if (value != null && type != undefined && type == 'json') {
      value = JSON.parse(value);
    }
    
    return value;
  }
  
  return null;
}

/**
 * Remove a value from localStorage.
 */
function custom_variable_remove(name) {
  localStorage.removeItem(name);
}

/**
 * Close the dialog confirm box.
 */
function custom_dialog_confirm_close() {
  if (jQuery("#custom-dialog-confirm").length) {
    jQuery("#custom-dialog-confirm").dialog("close");
  }
}

/**
 * Create / show a loading message for ajax processing.
 */
function custom_dialog_ajax_loading(title, message) {
  // Remove if exist.
  if (jQuery("#custom-dialog-ajax").length) {
    jQuery("#custom-dialog-ajax").remove();
  }
  
  // Set default value.
  title = title == undefined ? 'Đang xử lý...' : title;
  message = message == undefined ? 'Vui lòng chờ trong giây lát!' : message;
  
  // Create dialog.
  jQuery('body').append('<div id="custom-dialog-ajax" title="' + title + '" style="display: none;"></div>');

  jQuery("#custom-dialog-ajax").dialog({
    modal: true,
    closeOnEscape: false,
    width: 400,
    height: 'auto',
    resizable: false,
    draggable: false,
    close: function(event, ui) {
      jQuery("#custom-dialog-ajax").remove();
    },
    open: function(event, ui) {
      jQuery(".ui-dialog-titlebar-close", ui.dialog | ui).hide();
    }
  });
  
  // Show the dialog.
  jQuery("#custom-dialog-ajax").html(message);
  jQuery("#custom-dialog-ajax").dialog('option', 'position', {my: "center center", at: "center", of: window});
  jQuery("#custom-dialog-ajax").dialog('open');
  
  return jQuery("#custom-dialog-ajax");
}

/**
 * Create / show a dialog box for html display.
 */
function custom_dialog_html(title, html, width, height) {
  // Remove if exist.
  if (jQuery("#custom-dialog-html").length) {
    jQuery("#custom-dialog-html").remove();
  }
  
  // Build and process the form.
  jQuery('body').append('<div id="custom-dialog-html" title="' + title + '" style="display: none;"></div>');
    
  jQuery("#custom-dialog-html").dialog({
    modal: true,
    width: width,
    height: height,
    resizable: false
  });
  
  // Show the dialog.
  jQuery("#custom-dialog-html").html(html);

  // Set position and show.
  jQuery("#custom-dialog-html").dialog('option', 'position', {my: "center center", at: "center", of: window});
  jQuery("#custom-dialog-html").dialog('open');
}

/**
 * Close the dialog html box.
 */
function custom_dialog_html_close() {
  if (jQuery("#custom-dialog-html").length) {
    jQuery("#custom-dialog-html").dialog("close");
  }
}

/**
 * Create / show a dialog box for message alert.
 */
function custom_dialog_alert(title, message, callback) {
  // Remove if exist.
  if (jQuery("#custom-dialog-alert").length) {
    jQuery("#custom-dialog-alert").remove();
  }
  
  // Build and process the form.
  jQuery('body').append('<div id="custom-dialog-alert" title="' + title + '" style="display: none;"></div>');
    
  jQuery("#custom-dialog-alert").dialog({
    modal: true,
    width: 400,
    height: 'auto',
    resizable: false,
    buttons: [
      {
        text: 'Đồng ý',
        class: 'custom-dialog primary',
        click: function() {
          if (typeof callback == 'function') {
            jQuery(this).dialog("close");
            callback();
          }
          else{
            jQuery(this).dialog("close");
          }
        }
      }
    ]
  });
  
  // Show the dialog.
  jQuery("#custom-dialog-alert").html(message);

  // Set position and show.
  jQuery("#custom-dialog-alert").dialog('option', 'position', {my: "center center", at: "center", of: window});
  jQuery("#custom-dialog-alert").dialog('open');
}

/**
 * Create / show a dialog box for message alert.
 */
function custom_dialog_confirm(title, message, width, height, has_cancel, callback) {
  if (jQuery("#custom-dialog-confirm").length) {
    jQuery("#custom-dialog-confirm").remove();
  }
  
  jQuery('body').append('<div id="custom-dialog-confirm" title="' + title + '" style="display: none;"></div>');
  jQuery("#custom-dialog-confirm").dialog({
    modal: true,
    width: width,
    height: height,
    resizable: false,
    close: function(event, ui) {
      jQuery("#custom-dialog-confirm").remove();
    },
    buttons: [
      {
        text: 'Đồng ý',
        class: 'custom-dialog primary',
        click: function() {
          if (typeof callback == 'function') {
            callback();
            
            // Will be handled in callback function.
            //jQuery(this).dialog("close");
          }
          else{
            jQuery(this).dialog("close");
          }
        }
      }
    ]
  });
  
  // Add cancel button.
  if (has_cancel) {
    jQuery("#custom-dialog-confirm").dialog('option', 'buttons', [
      {
        text: 'Đồng ý',
        class: 'custom-dialog primary',
        click: function() {
          if (typeof callback == 'function') {
            callback();
          }
          else{
            jQuery(this).dialog("close");
          }
        }
      },
      {
        text: Drupal.t('Cancel'),
        class: 'custom-dialog secondary',
        click: function() {
          jQuery(this).dialog("close");
        }      
      }
    ]);
  }
  
  // Show the dialog.
  jQuery("#custom-dialog-confirm").append(message);
  
  // Set position and show.
  jQuery("#custom-dialog-confirm").dialog('option', 'position', {my: "center center", at: "center", of: window});
  jQuery("#custom-dialog-confirm").dialog('open');
}

/**
 * Convert number to text.
 * 1000 = 1 ngan.
 */
function custom_number_to_text(number) {
  // Get the number length.
  number =  isNaN(number) ? 0 : parseInt(number);
  var strlen = number.toString().length;
  
  // Convert to ty, trieu.
	if (strlen > 9) {
	  return Number((number / 1000000000).toFixed(2)).toString().replace(/\./g, ',') + ' tỷ';
	}	
	else if (strlen > 6) {
	  return Number((number / 1000000).toFixed(2)).toString().replace(/\./g, ',') + ' triệu';
	}
	else if (number > 0) {
    return custom_thousand_format(number, ',') + ' đ';
  }
  else{
    return 'Liên hệ';
  }
}

/**
 * Auto change the number to currency.
 */
function custom_thousand_format_auto(obj) {
  var number = jQuery(obj).val().trim();
  
  // Convert string to number.
  var number_validated = custom_string_to_number(number);
  
  // Convert to currency format.
  jQuery(obj).val(custom_thousand_format(number_validated, ','));
}

/**
 * Auto convert string to phone number.
 */
function custom_number_phone_format_auto(obj) {
  var string = jQuery(obj).val().trim();
  
  // Convert string to 0-9.
  var number = '';
  for (var i = 0; i < string.length; i++) {
    if (parseInt(string.charAt(i)) >= 0) {
      number += string.charAt(i);
    }
  }

  // Cut to 10 only.
  number = number.toString().substr(0, 10);
  
  jQuery(obj).val(number);
}

/**
 * Helper function to strip off all those are not number.
 */
function custom_string_to_number(string) {
  var number_validated = '';
  for (var i = 0; i < string.length; i++) {
    if (parseInt(string.charAt(i)) >= 0) {
      number_validated += string.charAt(i);
    }
  }

  return parseInt(number_validated) ? parseInt(number_validated) : '';
}

/**
 * Helper function to formar number to VND currency.
 */
function custom_thousand_format(number, decimal_point) {
  if (decimal_point == undefined) {decimal_point = '.';}
  
  number += '';
  x = number.split('.');
  x1 = x[0];
  x2 = x.length > 1 ? '.' + x[1] : '';
  var rgx = /(\d+)(\d{3})/;

  while (rgx.test(x1)) {
    x1 = x1.replace(rgx, '$1' + decimal_point + '$2');
  }
  return x1 + x2;
}

/**
 * Validate whether a text is valid email address.
 */
function custom_validate_is_email(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

/**
 * Validate a mobile number.
 * Must add: drupal_add_js(drupal_get_path('module', 'custom') . '/js/custom_mobilevn.js');
 */
function custom_validate_is_mobile_number(number) {
  if (mobile_data == undefined) {
    console.log('Mobilevn not installed.');
    return false;
  }

  // Process number.
  if (number.length != 10) {return false;}
  
  var number_prefix = number.substr(0, 3);
  
  for (var i = 0; i < mobile_data.length; i++) {
    var row = mobile_data[i];
    if (number_prefix == row.prefix) {
      return row.name;
    }
  }

  return false;
}

/**
 * Validate a URL.
 */
function custom_validate_is_url(url) {
  return /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(url);
}

/**
 * Helper function to send a service to server.
 */
/*
function custom_services_request(service_name, params, callback) {
  try {
	  // Obtain session token.
		var token_url = "?q=services/session/token"
		jQuery.ajax({
		  url: token_url,
		  type: 'get',
		  dataType: 'text',
		  error:function (jqXHR, textStatus, errorThrown) {
				if (!errorThrown) {
				  errorThrown = Drupal.t('Token retrieval failed!');
				}
		  },
		  success: function(token) {
				// Call the web service.
				jQuery.ajax({
				  url: '/?q=drupalgap/drupalapp/' + service_name + '.json',
				  type: 'post',
				  data: params,
				  dataType: 'json',
				  beforeSend: function(request) {
						request.setRequestHeader("X-CSRF-Token", token);
				  },
				  error: function (jqXHR, textStatus, errorThrown) {
						console.log(arguments);
				  },
				  success: function(data) {
				    callback(data);
				  }
				});
		  }
		});
  }
  catch (error) { console.log('drupalgap service error - ' + error); }
}
*/
