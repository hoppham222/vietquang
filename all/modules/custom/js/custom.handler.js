/**
 * @file
 * Custom JS library created by giaidieu.com.
 */
(function ($, Drupal, drupalSettings) {
  Drupal.behaviors.custom = {
    attach: function (context, settings) {
      if ($("body:not('.custom-processed')").length) {
        // Handle webform contact.
        if ($("#webform-submission-contact-node-4-add-form").length) {
          $("#webform-submission-contact-node-4-add-form").find('button[type="submit"]').attr('onclick', 'return _custom_webform_contact_validate(this);');
          $("#webform-submission-contact-node-4-add-form").find('input[name="so_dien_thoai"]').attr('onkeyup', 'custom_number_phone_format_auto(this);');
        }

        // Disable enter key in Search title.
        // Redirect to Tim-kiem. 
        $("#views-exposed-form-product-search-category-page-title-search input[name='keyword']").on('keyup keypress', function(e) {
          var keyCode = e.keyCode || e.which;
          if (keyCode === 13) {
            e.preventDefault();
            
            var keyword = $(this).val().trim();
            if (keyword.length >= 3) {
              document.location.href = encodeURI('/tim-kiem?keyword=' + keyword.replace(/\s+/g, '+') + '&sort_bef_combine=created_DESC');
            }
            
            return false;
          }
        });
        
        // Handle for main menu tree hover.
        $("a.menu-san-pham").hoverIntent(function() {
          // Check and load for the menu.
          if (!$("#menu-san-pham").length) {
            var menu = $('<div id="menu-san-pham" class="main-menu-tree"></div>');
            $(this).after(menu);
            
            custom_menu_load_callback(menu, 0);
          }
          
          $(this).addClass('active');
        }, function() {
          $(this).removeClass('active');
        });

        $("a.menu-den-philips").hoverIntent(function() {
          // Check and load for the menu.
          if (!$("#menu-den-philips").length) {
            var menu = $('<div id="menu-den-philips" class="main-menu-tree"></div>');
            $(this).after(menu);
            
            custom_menu_load_callback(menu, 836);
          }

          $(this).addClass('active');
        }, function() {
          $(this).removeClass('active');
        });

        $("a.menu-giai-phap-lumi").hoverIntent(function() {
          // Check and load for the menu.
          if (!$("#menu-giai-phap-lumi").length) {
            var menu = $('<div id="menu-giai-phap-lumi" class="main-menu-tree"></div>');
            $(this).after(menu);
            
            custom_menu_load_callback(menu, 837);
          }

          $(this).addClass('active');
        }, function() {
          $(this).removeClass('active');
        });
        
        // Add active links for page user menu.
        if ($("div.menu-user-profile").length) {
          $("div.menu-user-profile").find('a').each(function() {
            if (document.location.href.match($(this).attr('href')) && !$(this).hasClass('active')) {
              $(this).closest('li').addClass('active');
              $(this).addClass('active');
            }
          });
        }

        // Add file handler for user avatar.
        if ($("#user-avatar-file").length) {
          custom_user_avatar_handler('user-avatar-file');
        }
        
        // Add file dropzone handler.
        if ($("#custom-photo-form-wrapper.dropzone #photo-canvas").length) {
          //if (Modernizr.draganddrop) {
            // Add event listener to the Photo dropable placeholder.
            var photo_canvas = document.getElementById('photo-canvas');
            file_upload_options['image_style'] = 'image_190x140';
            
            photo_canvas.addEventListener('dragover', custom_file_drag_handler, false);
            photo_canvas.addEventListener('drop', custom_file_drop_handler, false);
          //}
        }
        
        // Add browse file handler.
        if ($("#custom-photo-form-wrapper.dropzone #custom-files").length) {
          file_upload_options['image_style'] = 'image_190x140';
          custom_file_handler('custom-files');
        }
        
        $("body").addClass('custom-processed');
      }
    }
  };
})(jQuery, Drupal, drupalSettings);
