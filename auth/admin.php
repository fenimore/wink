<?php
session_start();
if(!isset($_SESSION['loggedin'])){
   header("Location:login.php");
} else {
    echo "welcome";
}

$categories = array_filter(glob('../media/*'), 'is_dir');
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
      <h1>New Category</h1>
      <form action="../rest/create_category.php" method="post" enctype="multipart/form-data" id="catform">
        <label for="photos">Gallery: </label>
        <input class="form-control" type="text" name="category" placeholder="Category Name - Lower Case, No Spaces"><br>
        <input class="btn btn-success" type="submit" value="Create Category">
      </form>
    </div>
    <div class="col-md-4">
      <h1>Create Gallery</h1>
      <form action="../rest/create.php" method="post">
        <label for="photos">Category : </label>
        <input class="form-control" type="text" name="category"
        placeholder="Category Name - Must Already Exist"><br>
        <label for="dirname">Gallery : </label>
        <input class="form-control" type="text" name="gallery"
        placeholder="Gallery Name - Lower Case, No Spaces">
        <br>
        <input class="btn btn-success" type="submit" value="Create Gallery">
      </form>
    </div>
    <div class="col-md-4">
      <h1>Upload</h1>
      <form action="../rest/upload.php" method="post" enctype="multipart/form-data" id="uploadform">
        <label for="photos">Select Photographs: </label>
        <input class="btn btn-default" type="file" name="files[]" multiple><br>
        <select class="form-control" form="uploadform" name="fakepath">
          <option value="fakepath">doesnt work</option>
          <?php
            foreach($categories as $category) {
              $cat = substr($category, 9);
              echo '<option value="'.$cat.' ">';
              echo ucfirst($cat) . '</option>';
            }
          ?>
        </select>
        <label for="photos">Category : </label>
        <input class="form-control" type="text" name="category" placeholder="Category Name - Must Already Exist"><br>
        <label for="photos">Gallery : </label>
        <input class="form-control" type="text" name="gallery" placeholder="Gallery Name - Must Already Exist"><br>
        <input class="btn btn-success" type="submit" value="Upload Images">
      </form>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <h1>Delete Category</h1>
      <form action="../rest/delete.php" method="post">
        <label for="category">Category : </label>
        <input class="form-control" type="text" name="category" placeholder="This cannot be undone">
        <br>
        <input class="btn btn-danger" type="submit" value="Delete Directory!">
      </form>
    </div>
    <div class="col-md-4">
      <h1>Delete Gallery</h1>
      <form action="../rest/delete.php" method="post">
        <label for="category">Category : </label>
        <input class="form-control" type="text" name="category" placeholder="This cannot be undone">
        <br>
        <label for="gallery">Gallery : </label>
        <input class="form-control" type="text" name="gallery" placeholder="This cannot be undone">
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
