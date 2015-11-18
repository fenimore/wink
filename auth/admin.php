<?php
session_start();
if(!isset($_SESSION['loggedin'])){
   header("Location:login.php");
} else {
    echo "welcome";
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Wink - Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="favicon.ico">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style.css" type="text/css" media="screen"/>
</head>
<body>

<div class="container">
  <div class="row" style="margin-top:10%">
    <div class="col-md-4">
      <h1>Create Directory</h1>
      <form action="../rest/create.php" method="post">
        <label for="dirname">Directory name: </label>
        <input class="form-control" type="text" name="dirname">
        <br>
        <input class="btn btn-success" type="submit" value="New Directory">
      </form>
    </div>
    <div class="col-md-4">
      <h1>Upload</h1>
      <form action="../rest/upload.php" method="post" enctype="multipart/form-data">
        <label for="photos">Select Photographs: </label>
        <input class="btn btn-default" type="file" name="files[]" multiple>
        <label for="photos">Directory: </label>
        <!-- Make SELECT with PHP array -->
        <input class="form-control" type="text" name="dirname" placeholder="Which directory?"><br>
        <input class="btn btn-success" type="submit" value="Upload Images">
      </form>
    </div>
    <div class="col-md-4">
      <h1>Delete Directory</h1>
      <form action="../rest/delete.php" method="post">
        <label for="dirname">Directory name: </label>
        <input class="form-control" type="text" name="dirname">
        <br>
        <input class="btn btn-danger" type="submit" value="Delete Directory!">
      </form>
    </div>
  </div>
  <div class="row">
  <hr>
  <a href=../index.php><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Index</a>
  <a href=logout.php><span class="glyphicon glyphicon-road" aria-hidden="true"></span> Logout</a>
  </div>
</div>
</body>
</html>
