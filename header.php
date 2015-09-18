<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <?php if(isset($_SESSION['loggedin'])) { ?>
      <title> <?php echo $_SESSION['username'] . " - Resuming" ?> </title>
    <?php } else { ?>
      <title>Welcome to Resuming</title>
    <?php } ?>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="jumbotron-narrow.css" rel="stylesheet">

    <!-- Better file input! -->
    <link href="fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <script src="fileinput.min.js" type="text/javascript"></script>
</head>

<body>
  <div class="container">
    <div class="header clearfix">
      <nav>
        <ul class="nav nav-pills pull-right">
          <?php if(isset($_SESSION['loggedin'])) { ?>
            <li role="presentation"><a href="upload.php">Upload Resume</a></li>
            <li role="presentation"><a href="view.php">View Resume</a></li>
            <li role="presentation" class="active"><a href="logout.php">Logout</a></li>
          <?php } else { ?>
            <li role="presentation" class="active"><a href="login.php">Sign in</a></li>
          <?php } ?>
        </ul>
      </nav>
      <a href="/resuming/"><h3 class="text-muted">Resuming</h3></a>
    </div>
