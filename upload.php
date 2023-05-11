<?php
// Set the target directory for the uploaded image file
$target_dir = "folder/";

// Get the file extension of the uploaded image and convert it to lowercase
$imageFileType = strtolower(pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION));
    
// Check if the uploaded file is an image (JPEG, PNG, or GIF)
if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "gif") {
  // Construct the target file path by concatenating the target directory with the uploaded file's basename
  $target_file = $target_dir . basename($_FILES["photo"]["name"]);

  // Attempt to move the uploaded file to the target directory
  if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
    // If the file was uploaded successfully, display a success message
    echo "The file ". htmlspecialchars(basename($_FILES["photo"]["name"])). " has been uploaded.";
  } else {
    // If the file could not be uploaded, display an error message
    echo "Sorry, there was an error uploading your file.";
  }
} else {
  // If the uploaded file is not an image, display an error message
  echo "Sorry, only JPG, PNG, and GIF files are allowed.";
}
?>
