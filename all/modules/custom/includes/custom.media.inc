<?php 
/**
 * @file Custom media functions handler.
 * @creator giaidieu.com
 * @created 20 Jul 2018
 * @updated 28 Oct 2020
 */

use Drupal\file\Entity\File;

/**
 * Process to upload image file to server then return its fid.
 * Mostly will use this function via the ajax caller for filefield uploader.
 */
function custom_photo_upload() {
  // Move the images file into the folder
  if (isset($_FILES['file']) and !empty($_FILES['file']['name'])) {
    // Prepare for temp folder.
    $filepath_public = 'public://file-dropzone-temp';
    if (!file_prepare_directory($filepath_public, FILE_CREATE_DIRECTORY)) {
      \Drupal::logger('custom')->error(t('Could not find folder %folder', array('%folder' => $filepath_public)));
      return null;
    }
    
    //$image_name = strtolower($_FILES['file']['name']);

    // Clean the filename.
    $image_name = 'r_' . time() . '_' . strtolower($_FILES['file']['name']);
    $image_name = \Drupal::service('transliterate_filenames.sanitize_name')->sanitizeFilename($image_name);

    // Get the absolute filepath.
    $filepath_real = drupal_realpath($filepath_public) . '/' . $image_name;

    if (!move_uploaded_file($_FILES['file']['tmp_name'], $filepath_real)) {
      \Drupal::logger('custom')->error(t('Could not move the uploaded image %image_name to the right folder.', array('%image_name' => $filepath_real)));
    }
    else{
      // Create file entity.
      $user = \Drupal::currentUser();
      $uri = $filepath_public . '/' . $image_name;
      
      $file = File::create([
        'uri' => $uri,
        'uid' => $user->id(),
        'status' => 0,
      ]);
      
      $file->save();
      if ($file->id()) {
        return $file;
      }
      else{
        \Drupal::logger('custom')->error(t('Could not store image %folder / %image_name', array('%image_name' => $image_name, '%folder' => $filepath_public)));
      }
    }
  }

  // Failed to process the file.
  return null;
}

/**
 * Process to upload image data to server then return its fid.
 * Mostly will used via the HTML 5 canvas imagedata upload.
 */
function custom_photo_data_upload($filename, $imagedata) {
  // Prepare for temp folder.
  $filepath_public = 'public://file-dropzone-temp';
  if (!file_prepare_directory($filepath_public, FILE_CREATE_DIRECTORY)) {
    \Drupal::logger('custom')->error(t('Could not find folder %folder', array('%folder' => $filepath_public)));
    return null;
  }

	// Clean the filename.
  $filename = 'd_' . time() . '_' . strtolower($filename);
  $filename = \Drupal::service('transliterate_filenames.sanitize_name')->sanitizeFilename($filename);

	// Create image fieldfield object then store.
  $filepath = $filepath_public . '/' . $filename;
	$file = file_save_data(base64_decode($imagedata), $filepath, FILE_EXISTS_RENAME);

	// Set to temp file.
	$file->status = 0;
	$file->save();

	if ($file->id()) {
	  // Return the fid for continuing processing.
		return $file;
	}

  // Failed to process. Return fid as 0.
  return null;
}
