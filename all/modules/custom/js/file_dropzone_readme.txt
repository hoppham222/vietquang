<input type="file" name="file" id="user-avatar-file" accept="image/*" style="display: none;" />
<input id="custom-files" type="file" multiple="multiple" name="custom_files[]" />

1. Create hook_theme and template: custom--fileupload-drop-area
2. Add html markup for file and dropzone via the hook_form
3. Add custom.files.js to handle all js event
4. Add path in routing to handle for upload path custom/photo-upload
5. Add php function custom_photo_upload to handle in customController and custom.media.inc