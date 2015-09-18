<?php
  require_once 'session.php';
  require_once 'config.php';

  if (!isset($_SESSION['loggedin'])) {
    Header("Location: login.php");
  }

  include 'header.php';

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

      // Backup existing file
      if(file_exists($destination_file)) {
        // Find the number of files that exist for current user
        $filecount = count(glob($backup_dir . $username . "*.pdf"));
        $backup_file = $backup_dir . $username . "_" . $filecount . ".pdf";
        rename($destination_file, $backup_file);
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
      foreach ($errors as $index => $error) {
        echo $error;
      }
    }
  }
?>

<div class ="container">
  <p>Your existing resume will be replaced by the one you upload now.</p>
  <br>
  <form action="" method="POST" enctype="multipart/form-data">
     <input id="file-uploader" name="file" type="file" class="file" data-show-preview="false">
  </form>
</div>
<br> <br> <br>

<?php include 'footer.php'; ?>

<script>
  $(document).ready(function() {
    $("#file-uploader").fileinput({'allowedFileExtensions': ['pdf'], 'maxFileSize': 10240});
  });
</script>
