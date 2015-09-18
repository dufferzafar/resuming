<?php
  require_once 'session.php';
  require_once 'config.php';

  // Report me some errors
  error_reporting(E_ERROR | E_WARNING | E_PARSE );
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);

  include 'header.php';
?>

<div class="jumbotron">
  <h1>Upload your resume</h1>
  <p class="lead">There is no need to worry if you have already uploaded your resume. We're just lazy coders. Also, if you want to replace your resume with a newer version, use this button, we'll replace the older one automatically.</p>
  <p><a class="btn btn-lg btn-success" href="upload.php" role="button">Upload Resume</a></p>
</div>

<div class="row marketing">
  <div class="col-lg-6">
    <h4>View Resume</h4>
    <p>Check if you've uploaded the correct thing. If you dun goof'd, no problem, upload again to replace the current copy.</p>
    <p><a class="btn btn-primary" href="view.php" role="button">View Resume &raquo;</a></p>
  </div>

  <div class="col-lg-6">
    <h4>Change Password</h4>
    <p>Auto assigned passwords are a bitch to remember, right? Well, here's your chance to lower your account security :)</p>
    <p><a class="btn btn-primary disabled" href="#" role="button" >Change Password &raquo;</a></p>
    <p>(feature coming soon.)</p>
  </div>
</div>

<!--
  Top level container will be closed in footer.
  (this is what quick & dirty means, people)
 -->
<?php include 'footer.php'; ?>
