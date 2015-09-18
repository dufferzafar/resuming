<?php
  require_once 'session.php';
  require_once 'config.php';

  if (!isset($_SESSION['loggedin'])) {
    Header("Location: login.php");
  }

  $username = $_SESSION['username'];
  $resume =  $upload_dir . $username . ".pdf";

  if(! file_exists($resume)) {

    include 'header.php';

    echo "Your resume doesn't exist. Contact administrators immediately.";
    echo "<br> <br>";

    echo "File not found - " . $resume;
    echo "<br> <br>";

    include 'footer.php';

  }
  else {
    header('Content-Description: File Transfer');
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename*=UTF-8\'\'' . rawurlencode(basename($resume)));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($resume));
    ob_clean();
    flush();
    readfile($resume);
    exit;
  }
?>
