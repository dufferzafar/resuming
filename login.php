<?php
  require_once 'session.php';
  require_once 'config.php';

  if(isset($_SESSION['loggedin'])) {
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
      // Code quality doesn't matter at hackthons right?
      include 'header.php';
      echo "<div class=\"alert alert-danger\" role=\"alert\">Couldn't log you in.</div>";
    }
  }

  include 'header.php';
?>

  <div class="container">
    <div class="col-lg-6 col-lg-offset-3">
      <h2 class="form-signin-heading">Please sign in</h2>
      <form class="form-signin" method="post" action="">
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <br>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
    </div>
  </div> <!-- / inner container -->
<br> <br> <br>

<?php include 'footer.php'; ?>
