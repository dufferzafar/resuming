<?php

  $db = new SQLite3('/home/dufferzafar/dev/collector/resume.db3') or die("Cannot open the database");

  $backup_dir = "/home/dufferzafar/dev/collector/storage/backups/";
  $upload_dir = "/home/dufferzafar/dev/collector/storage/uploads/";
  if (!is_dir($upload_dir) && !is_writable($upload_dir)) {
    die('Upload directory is not writable, or does not exist.');
  }

?>
