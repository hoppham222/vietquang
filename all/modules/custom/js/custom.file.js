/* custom.file.js created by giaidieu.com */
var file_upload_options = {
  'min_width': 400,
  'min_height': 400,
  'max_filesize': 5,
  'image_style': 'thumbnail',
  'max_files': 10,
  'url': '/custom/photo-upload'
};

// Auto trigger file browse via a click somewhere.
function custom_file_browse_trigger(file_id) {
  jQuery("#" + file_id).trigger('click');
}

// File drag handler.
function custom_file_drag_handler(e) {
  e.stopPropagation();
  e.preventDefault();
  e.dataTransfer.dropEffect = 'copy';
}

/**
 * File drop handler.
 */
function custom_file_drop_handler(e) {
  // Get the files.
  e.stopPropagation();
  e.preventDefault();

  var files = null;
  if (e.dataTransfer != undefined) {
    files = e.dataTransfer.files;
  }
  else{
    files = e.target.files;
  }

  // Control number of files allowed.
  var files_list_obj = jQuery("input[name='custom_files_list']");
  var total_files = files_list_obj.val() != '' ? parseInt(files_list_obj.val().split(/\,/).length) : 0;
  var total_uploads = parseInt(files.length);
          
  if (total_files >= file_upload_options['max_files']) {
    custom_dialog_alert('Thông báo', 'Số ảnh hiện có của bạn đã ở hạn mức là ' + file_upload_options['max_files'] + '. Vui lòng bỏ bớt để tải ảnh mới.');
    return false;
  }
  else if (total_files + total_uploads > file_upload_options['max_files']) {
    var remain = total_files + total_uploads - file_upload_options['max_files'];
    custom_dialog_alert('Thông báo', "Số ảnh hiện có của bạn là " + total_files + ". Số ảnh đưa lên là " + total_uploads + " đã vượt quá hạn mức tối đa " + file_upload_options['max_files'] + " ảnh.\nVui lòng bỏ bớt " + remain + " ảnh rồi thử lại.");
    return false;
  }
          
  if (files) {
    custom_file_drop_process(files, function(op, obj) {
      var wrapper = jQuery("#custom-photo-form-wrapper");
      
      // Add to list.
      if (op == 'wrapper') {
        wrapper.find("#photos-list").append(obj);
      }
      else{
        var photo_div = wrapper.find("#photos-list .photo-thumb-wrapper[fid='" + jQuery(obj).attr('fid') + "']");
        photo_div.addClass('loaded').html(obj);
        photo_div.append('<span class="controls" onclick="custom_file_remove(this);"><i class="fa fa-times" aria-hidden="true" title="Nhấn để bỏ ảnh này"></i></span>');

        // Add draggable to this object.
        jQuery(photo_div).draggable({revert: true});

        // Add to fid list.
        _custom_fids_topup(obj.attr('fid'));
      }
    });
  }
}

/**
 * Handle when remove a photo.
 */
function custom_file_remove(obj) {
  custom_dialog_confirm("Xác nhận", "Bạn chắc chắn muốn bỏ ảnh này?", 400, 'auto', true, function() {
    var fid = parseInt(jQuery(obj).closest('div.photo-thumb-wrapper').attr('fid'));
    if (!fid) {
      custom_dialog_alert('Thông báo', 'Không tìm thấy thông tin file ảnh. Vui lòng thử lại sau.');
      return false;
    }
    
    // Close the popup.
    jQuery("#custom-dialog-confirm").dialog("close");
    
    // Remove from the list.
    jQuery(obj).closest('div.photo-thumb-wrapper').fadeOut(function() {
      jQuery(this).remove();
      _custom_fids_remove(fid);
    });
  });
  
  return false;
}

/**
 * Revove fid to the list.
 */
function _custom_fids_remove(fid) {
  var fids = jQuery("input[name='custom_files_list']").val();
  if (fids != '') {
    fids = fids.split(/\,/);
  }
  else{
		fids = new Array();
  }
  
  // Remove from the list.
  var new_fids = new Array();
  for (var i = 0; i < fids.length; i++) {
    if (fids[i] != fid) {
      new_fids.push(fids[i]);
    }
  }
  
  if (!new_fids.length) {
    jQuery("input[name='custom_files_list']").val('');
  }
  else{
    jQuery("input[name='custom_files_list']").val(new_fids.join(','));
  }
}

/**
 * Topup fid to the list.
 */
function _custom_fids_topup(fid) {
  var fids = jQuery("input[name='custom_files_list']").val();
  if (fids != '') {
    fids = fids.split(/\,/);
  }
  else{
		fids = new Array();
  }

  fids.push(fid);
  
  // Make sure no duplication.
  var new_fids = new Array();
  for (var i = 0; i < fids.length; i++) {
    if (jQuery.inArray(fids[i], new_fids) == -1) {
      new_fids.push(fids[i]);
    }
  }

  jQuery("input[name='custom_files_list']").val(new_fids.join(','));
}

/**
 * File drop process.
 * file_id: id of the file field.
 * options: {
 *   max_filesize: 5,
 *   min_width: 300,
 *   min_height: 300,
 *   url: '/custom/photo-upload' - This URL will return fid if success.
 * }
 * callback: use to output result and process.
 */
function custom_file_drop_process(files, callback) {
  // Process for multiple files.
  for (var i = 0, f; f = files[i]; i++) {
		// Validate the input:
		// Must be images.
		if (!f.type.match('image.*')) {
		  custom_dialog_alert('Thông báo', 'File ' + f.name.toUpperCase() + ' không phải là định dạng ảnh.');
		  continue;
		}

    // Must less than options.max_filesize * 1024 * 1024 MB.
    if (f.size > file_upload_options['max_filesize'] * 1024 * 1024) {
      custom_dialog_alert('Thông báo', 'File ' + f.name.toUpperCase() + ' có kích thước lớn hơn ' + file_upload_options['max_filesize'] + 'MB.');
 			continue;
    }

    // Read the file for checking dimension.
    var reader = new FileReader();

    // Closure to capture the file information.
    reader.onload = (function(theFile) {
      return function(e) {
				var image = new Image();
				var file = e;

        image.onload = function(e) {
          var width = this.width;
          var height = this.height;
					var is_error = false;

					if (width < file_upload_options['min_width']) {
						custom_dialog_alert('Thông báo', 'File ' + theFile.name.toUpperCase() + ' có chiều rộng nhỏ hơn ' + file_upload_options['min_width'] + 'px.');
						is_error = true;
					}

					if (height < file_upload_options['min_height']) {
						custom_dialog_alert('Thông báo', 'File ' + theFile.name.toUpperCase() + ' có chiều cao nhỏ hơn ' + file_upload_options['min_height'] + 'px.');
						is_error = true;
					}

					// Show the image in the list.
					if (!is_error) {
            var image_wrapper = jQuery('<div class="photo-thumb-wrapper">Đang tải</div>');
            callback('wrapper', image_wrapper);

						// Build files form submit.
						var formData = new FormData();
						formData.append('file', theFile);

            // Add image style to be returned.
            formData.append('image_style', file_upload_options['image_style']);

						var xhr = new XMLHttpRequest();
						xhr.open('POST', file_upload_options['url']);
						xhr.onload = function () {
							if (xhr.status === 200) {
								// Done, success.
								// Update and close popup.
                var file = JSON.parse(xhr.response);
                //console.log(file);

								if (!jQuery.isEmptyObject(file)) {
								  // Output or process the result.
								  if (typeof callback == 'function') {
								    var image = jQuery('<img src="' + file['url'] + '" class="photo-thumb" alt="' + file['filename'] + '" />');
                    
								    image.attr('fid', file['fid']);
                    image_wrapper.attr('fid', file['fid']);
								    callback('image', image);
								  }
								}
                else{
                  custom_dialog_alert('Thông báo', 'Có lỗi trong quá trình tải ảnh. Xin vui lòng thử lại.');
                }
						  }
							else {
								custom_dialog_alert('Thông báo', 'Không kết nối được tới máy chủ. Xin vui lòng thử lại.');
							}
						};

						xhr.send(formData);

					}
					else{
						// Error.
						// To-do.
             console.log('Validation error. Not uploading file.');
					}
				};

				image.src = e.target.result;
			};
		})(f);

		// Read in the image file as a data URL.
		reader.readAsDataURL(f);
	}
  
  return false;
}

/**
 * Process showing thumbnail and store to server, return fid.
 */
function custom_file_image_data_process(img_selector, imagedata, callback) {
  var img = $(img_selector);
  if (!img.length) {return false;}

	// Show image in preview section.
	img.attr('src', 'data:image/jpeg;base64,' + imagedata);

	// Send to server for fid returning.
	var filename = Drupal.user.name + '_' + Date.now() + '.jpg';
	custom_services_call('photo_data_upload', {filename: filename, imagedata: imagedata}, function(result) {
		if (parseInt(result) > 0) {
			img.attr('fid', result);

			if (typeof callback == 'function') {callback(img);}
		}
		else{
			custom_dialog_alert('Thông báo', 'Có lỗi trong lúc xử lý file. Xin vui lòng thử lại.');
		}
	});
}

/**
 * File handler.
 */
function custom_file_handler(file_id) {
  custom_file_browse_process(file_id, function(op, obj) {
    var wrapper = jQuery("#custom-photo-form-wrapper");
        
    // Add to list.
    if (op == 'wrapper') {
      wrapper.find("#photos-list").append(obj);
    }
    else{
      var image_wrapper = wrapper.find("#photos-list .photo-thumb-wrapper[fid='" + jQuery(obj).attr('fid') + "']");
      image_wrapper.addClass('loaded').html(obj);

      image_wrapper.append('<span class="controls" onclick="custom_file_remove(this);"><i class="fa fa-times" aria-hidden="true" title="Nhấn để bỏ ảnh này"></i></span>');

      // Add draggable to this object.
      jQuery(image_wrapper).draggable({revert: true});

      // Add to fid list.
      _custom_fids_topup(obj.attr('fid'));
    }
  });
}

/**
 * File browse for user avatar process.
 * file_id: id of the file field.
 * callback: use to output result and process.
 */
function custom_user_avatar_file_browse_process(file_id, callback) {
  //var file = document.getElementById(file_id);
  var file = jQuery("#" + file_id);

  if (!file.length) {return false;}

  file.change(function(e) {
		e.stopPropagation();
		e.preventDefault();

		var files = null;
		if (e.dataTransfer != undefined) {
			files = e.dataTransfer.files;
		}
		else{
			files = e.target.files;
		}

		for (var i = 0, f; f = files[i]; i++) {
			// Validate the input:
			// Must be images.
			if (!f.type.match('image.*')) {
				custom_dialog_alert('Thông báo', 'File ' + f.name.toUpperCase() + ' không phải là định dạng ảnh.');
				continue;
			}

			// Must less than options.max_filesize * 1024 * 1024 MB.
			if (f.size > file_upload_options['max_filesize'] * 1024 * 1024) {
				custom_dialog_alert('Thông báo', 'File ' + f.name.toUpperCase() + ' có kích thước lớn hơn ' + file_upload_options['max_filesize'] + 'MB.');
				continue;
			}

			// Read the file for checking dimension.
			var reader = new FileReader();

			// Closure to capture the file information.
			reader.onload = (function(theFile) {
				return function(e) {
					var image = new Image();
					var file = e;

					image.onload = function(e) {
						var width = this.width;
						var height = this.height;
						var is_error = false;

						if (width < 100) {
							custom_dialog_alert('Thông báo', 'File ' + theFile.name.toUpperCase() + ' có chiều rộng nhỏ hơn 100px.');
							is_error = true;
						}

						if (height < 100) {
							custom_dialog_alert('Thông báo', 'File ' + theFile.name.toUpperCase() + ' có chiều cao nhỏ hơn 100px.');
							is_error = true;
						}

						// Show the image in the list.
						if (!is_error) {
							// Build files form submit.
							var formData = new FormData();
							formData.append('file', theFile);
              
              // Add image style to be returned.
              formData.append('image_style', 'thumbnail');
              
              // Show a loading message.
              var loading_message = custom_dialog_ajax_loading();

							var xhr = new XMLHttpRequest();
							xhr.open('POST', file_upload_options['url']);
							xhr.onload = function () {
								if (xhr.status === 200) {
									// Done, success.
                  loading_message.dialog('close');
                  
								  // Update and close popup.
                  var file = JSON.parse(xhr.response);
                  //console.log(file);

								  if (!jQuery.isEmptyObject(file)) {
								    // Return the image object.
								    if (typeof callback == 'function') {
								      var image = jQuery('<img src="' + file['url'] + '" fid="' + file['fid'] + '" class="photo-thumb" alt="' + file['filename'] + '" />');
								      callback(image);
								    }
								  }
                  else{
                    custom_dialog_alert('Thông báo', 'Có lỗi trong quá trình tải ảnh. Xin vui lòng thử lại.');
                  }
								}
								else {
									custom_dialog_alert('Thông báo', 'Không kết nối được tới máy chủ. Xin vui lòng thử lại.');
								}
							};

							xhr.send(formData);

						}
						else{
							// Error.
							// To-do.
              console.log('Validation error. Not uploading file.');
						}
					};

					image.src = e.target.result;
				};
			})(f);

			// Read in the image file as a data URL.
			reader.readAsDataURL(f);
		}

    return false;
	});
}

/**
 * File browse process.
 * file_id: id of the file field.
 * options: {
 *   max_filesize: 5,
 *   max_files: 20,
 *   min_width: 300,
 *   min_height: 300,
 *   url: '/image-process' - This URL will return fid if success.
 * }
 * callback: use to output result and process.
 */
function custom_file_browse_process(file_id, callback) {
  //var file = document.getElementById(file_id);
  var file = jQuery("#" + file_id);

  if (!file.length) {return false;}

  file.change(function(e) {
		e.stopPropagation();
		e.preventDefault();

		var files = null;
		if (e.dataTransfer != undefined) {
			files = e.dataTransfer.files;
		}
		else{
			files = e.target.files;
		}

    // Control number of files allowed.
    if (file_id == 'custom-files') {
      var total_files = jQuery("input[name='custom_files_list']").val() != '' ? parseInt(jQuery("input[name='custom_files_list']").val().split(/\,/).length) : 0;
      var total_uploads = parseInt(files.length);
          
      if (total_files >= file_upload_options['max_files']) {
        custom_dialog_alert('Thông báo', 'Số ảnh hiện có của bạn đã ở hạn mức là ' + file_upload_options['max_files'] + '. Vui lòng bỏ bớt để tải ảnh mới.');
        return false;
      }
      else if (total_files + total_uploads > file_upload_options['max_files']) {
        var remain = total_files + total_uploads - file_upload_options['max_files'];
        custom_dialog_alert('Thông báo', "Số ảnh hiện có của bạn là " + total_files + ". Số ảnh đưa lên là " + total_uploads + " đã vượt quá hạn mức tối đa " + file_upload_options['max_files'] + " ảnh.\nVui lòng bỏ bớt " + remain + " ảnh rồi thử lại.");
        return false;
      }

      // Limit number of files to be uploaded.
      if (files.length > file_upload_options['max_files']) {
        custom_dialog_alert('Thông báo', 'Số lượng file đưa lên vượt quá ' + file_upload_options['max_files'] + ' ảnh cho phép.');
        return false;
      }
    }

		for (var i = 0, f; f = files[i]; i++) {
			// Validate the input:
			// Must be images.
			if (!f.type.match('image.*')) {
				custom_dialog_alert('Thông báo', 'File ' + f.name.toUpperCase() + ' không phải là định dạng ảnh.');
				continue;
			}

			// Must less than options.max_filesize * 1024 * 1024 MB.
			if (f.size > file_upload_options['max_filesize'] * 1024 * 1024) {
				custom_dialog_alert('Thông báo', 'File ' + f.name.toUpperCase() + ' có kích thước lớn hơn ' + file_upload_options['max_filesize'] + 'MB.');
				continue;
			}

			// Read the file for checking dimension.
			var reader = new FileReader();

			// Closure to capture the file information.
			reader.onload = (function(theFile) {
				return function(e) {
					var image = new Image();
					var file = e;

					image.onload = function(e) {
						var width = this.width;
						var height = this.height;
						var is_error = false;

						if (width < file_upload_options['min_width']) {
							custom_dialog_alert('Thông báo', 'File ' + theFile.name.toUpperCase() + ' có chiều rộng nhỏ hơn ' + file_upload_options['min_width'] + 'px.');
							is_error = true;
						}

						if (height < file_upload_options['min_height']) {
							custom_dialog_alert('Thông báo', 'File ' + theFile.name.toUpperCase() + ' có chiều cao nhỏ hơn ' + file_upload_options['min_height'] + 'px.');
							is_error = true;
						}

						// Show the image in the list.
						if (!is_error) {
              var image_wrapper = jQuery('<div class="photo-thumb-wrapper">Đang tải</div>');
              callback('wrapper', image_wrapper);

							// Build files form submit.
							var formData = new FormData();
							formData.append('file', theFile);
              
              // Add image style to be returned.
              formData.append('image_style', file_upload_options['image_style']);

							var xhr = new XMLHttpRequest();
							xhr.open('POST', file_upload_options['url']);
							xhr.onload = function () {
								if (xhr.status === 200) {
									// Done, success.
								  // Update and close popup.
                  var file = JSON.parse(xhr.response);
                  //console.log(file);

								  if (!jQuery.isEmptyObject(file)) {
								    // Output or process the result.
								    if (typeof callback == 'function') {
								      var image = jQuery('<img src="' + file['url'] + '" class="photo-thumb" alt="' + file['filename'] + '" />');
                    
								      image.attr('fid', file['fid']);
                      image_wrapper.attr('fid', file['fid']);
								      callback('image', image);
								    }
								  }
                  else{
                    custom_dialog_alert('Thông báo', 'Có lỗi trong quá trình tải ảnh. Xin vui lòng thử lại.');
                  }
								}
								else {
									custom_dialog_alert('Thông báo', 'Không kết nối được tới máy chủ. Xin vui lòng thử lại.');
								}
							};

							xhr.send(formData);

						}
						else{
							// Error.
							// To-do.
              console.log('Validation error. Not uploading file.');
						}
					};

					image.src = e.target.result;
				};
			})(f);

			// Read in the image file as a data URL.
			reader.readAsDataURL(f);
		}

    return false;
	});
}

/**
 * File handler.
 * file_id: id of the file field.
 * options: {
 *   max_filesize: 5,
 *   url: '/custom/video-upload' - This URL will return fid if success.
 * }
 * callback: use to output result and process.
 */
function custom_file_video_handler(file_id, options, callback) {
  //var file = document.getElementById(file_id);
  var file = jQuery("#" + file_id);

  if (!file.length || file.hasClass('disabled')) {return false;}

  file.change(function(e) {
		e.stopPropagation();
		e.preventDefault();

		// Setup default value.
		options.max_filesize = options.max_filesize == undefined ? 250 : options.max_filesize; // in MB
		options.url = options.url == undefined ? '/video-process' : options.url;

		var files = null;
		if (e.dataTransfer != undefined) {
			files = e.dataTransfer.files;
		}
		else{
			files = e.target.files;
		}

		for (var i = 0, f; f = files[i]; i++) {
			// Validate the input:
			// Must be video.
			//if (!f.type.match('image.*')) {
				//alert('File ' + f.name.toUpperCase() + ' không phải là định dạng ảnh.');
				//continue;
			//}

			// Must less than options.max_filesize * 1024 * 1024 MB.
			if (f.size > options.max_filesize * 1024 * 1024) {
				custom_dialog_alert('Thông báo', 'File ' + f.name.toUpperCase() + ' có kích thước lớn hơn ' + options.max_filesize + 'MB.');
				continue;
			}
      
      // Disable the file field waiting for upload.
      file.addClass('disabled');
      
      // Show ajax loader.
      file.parent().children('.video-add-wrapper').addClass('is-uploading').prepend('<img src="/sites/all/themes/giaidieu/images/ajax-loader.gif" class="ajax-loader" />');

			// Read the file for checking dimension.
			var reader = new FileReader();

			// Closure to capture the file information.
			reader.onload = (function(theFile) {
				return function(e) {
					//var file = e;

          // Build files form submit.
          var formData = new FormData();
          formData.append('file', theFile);

          var xhr = new XMLHttpRequest();
          xhr.open('POST', options.url);
          xhr.onload = function() {
            // Enable field field back.
            file.removeClass('disabled');
            file.parent().children('.video-add-wrapper').removeClass('is-uploading').find('img.ajax-loader').remove();
            
            if (xhr.status === 200) {
              // Done, success.
		          // Output or process the result.
              if (typeof callback == 'function') {
				        callback(xhr.response);
              }
              else{
                custom_dialog_alert('Thông báo', 'Có lỗi trong quá trình tải file. Xin vui lòng thử lại.');
              }
            }
            else{
              custom_dialog_alert('Thông báo', 'Không kết nối được tới máy chủ. Xin vui lòng thử lại.');
            }
          };

          xhr.send(formData);
				};
			})(f);

			// Read in the image file as a data URL.
			reader.readAsDataURL(f);
		}

    return false;
	});
}
