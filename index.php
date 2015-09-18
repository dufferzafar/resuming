<?php
  require_once 'session.php';
  require_once 'config.php';

  // Report me some errors
  error_reporting(E_ERROR | E_WARNING | E_PARSE);
  ini_set('display_errors',1);
  ini_set('display_startup_errors',1);

?>

<?php
if($_SESSION['loggedin'] == 1) {
  Header("Location: upload.php");
}
elseif(isset( $_POST['email'], $_POST['password'])) {
  $stmt = $db->prepare('SELECT * FROM users WHERE email=:email and password=:password LIMIT 1');
  $stmt->bindValue(':email', $_POST['email'], SQLITE3_TEXT);
  $stmt->bindValue(':password', $_POST['password'], SQLITE3_TEXT);

  $result = $stmt->execute();
  $row = $result->fetchArray();

  if (!empty($row)) {
    $_SESSION['loggedin'] = 1;
    $_SESSION['username'] = $row[1];

    header("location: upload.php");
  }
  else {
    echo "Couldn't log you in.";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Resumes!</title>
  </head>

  <body>
    <form action="" method="post">
      <fieldset>
        <p>
          <label for="email">Email ID:</label>
          <input type="text" id="email" name="email" value="" />
        </p>
        <p>
          <label for="password">Password:</label>
          <input type="text" id="password" name="password" value="" />
        </p>
        <p>
          <input type="submit" value="&rarr; Login" />
        </p>
      </fieldset>
    </form>
  </body>

</html>
