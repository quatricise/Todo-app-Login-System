<?php 
if (isset($_POST['image-submit'])) {
  $file = $_FILES['image'];

  $filename = $_FILES['image']['name'];
  $fileTmpname = $_FILES['image']['tmp_name'];
  $fileSize = $_FILES['image']['size'];
  $fileError = $_FILES['image']['error'];
  $fileType = $_FILES['image']['type'];
  $fileExtens = explode('.', $filename);
  $fileActualExtens = strtolower(end($fileExtens));
  // print_r($fileActualExtens);
  // print_r($fileSize);

  $allowedExtens = array('jpeg','jpg','png','gif','tiff','webp',);

  if (in_array($fileActualExtens, $allowedExtens) == false) {
    // header('Location: index.php?imageuploadfailed');
    exit('Sorry, this filetype is not supported.');
  }
  if ($fileError !== 0) {
    // header('Location: index.php?imageuploadfailed');
    exit('There was an error uploading your file.');     
  }
  if ($fileSize > 1048576) {
    // header('Location: index.php?imageuploadfailed');
    exit('Your file exceeds the 1 MB limit, what do you think this is, Google Drive??');
  }
  else {
    $fileID = uniqid('', true) . "." . $fileActualExtens;
    $fileDestination = 'uploads/' . $fileID;
    move_uploaded_file($fileTmpname, $fileDestination);
    header('Location: index.php?imageuploadsuccessful');

  }
  
}