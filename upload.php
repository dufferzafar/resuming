<?php
  require_once "session.php";

  if (!isset($_SESSION['loggedin'])) die("You need to be logged in to access this page.");

  if (isset($_FILES['file'])) {

    $username = $_SESSION['username'];
    $destination_file =  $upload_dir . $username . ".pdf";

    $errors = array();

    $file_name = $_FILES['file']['name'];
    $file_size =$_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    $file_ext = strtolower(end(explode('.', $_FILES['file']['name'])));

    $extensions = array("pdf");
    if(in_array($file_ext, $extensions)=== false) {
      $errors[] = "Extension not allowed, please choose a PDF file.";
    }

    if($file_size > (5 * 1024 * 1024)) {
      $errors[] = 'File size should be less than 5 MB';
    }

    if(empty($errors) == true) {
      // Delete existing file
      if(file_exists($destination_file)) {
        chmod($destination_file, 0755);
        unlink($destination_file);
      }

      // And move new one
      $moved = move_uploaded_file($file_tmp, $destination_file);
      if( $moved ) {
        echo "Successfully uploaded";
      } else {
        echo "Not uploaded";
      }
    }
    else {
      // TODO: Better Error Handling / Printing
      print_r($errors);
    }
  }
?>

<?php echo "Hello, " . $_SESSION['username']; ?>
<form action="" method="POST" enctype="multipart/form-data">
  <input type="file" name="file" />
  <input type="submit"/>
</form>

<b id="logout"><a href="logout.php">Log Out</a></b>
