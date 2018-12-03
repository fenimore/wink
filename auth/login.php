<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['visitor']) || isset($_SESSION['admin'])){
    header("Location:index.php" );
}

$redirect = htmlspecialchars($_GET["redirect"]);
$role = htmlspecialchars($_GET["role"]);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Wink - Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="favicon.ico">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style.css" type="text/css" media="screen"/>
</head>
<body>

<div class="container">
  <div class="row">
            Enter password below
    <div class="col-md-4" style="margin-top:20%">
      <form class="form-inline" action="authenticate.php" method="post">
        <div class=form-group">
        <label for="pssword" style="display:none;">Password: </label>
        <input class="pssword form-control" type="password" name="password" autofocus>

        <label for="role" style="display:none;"></label>
        <input style="display:none" class="form-control" type="text" name="role" value="<?php echo $role; ?>">
        <label for="redirect" style="display:none;"></label>
        <input style="display:none" class="form-control" type="text" name="redirect" value="<?php echo $redirect; ?>">
        <button class="pssword btn btn-default" type="submit">login
        </button>
        </div>
      </form>
    </div>
  </div>
  <div class="row">
  <hr>
  <a href=../index.php><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Index</a>
  </div>
</div>
</body>
</html>
