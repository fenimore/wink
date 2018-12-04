<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['admin'])){
    header("Location:login.php?redirect=admin.php&role=admin");
    die();
}

$categories = array_filter(glob('../media/*'), 'is_dir');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Wink - Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../favicon.ico">
    <link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style.css" type="text/css" media="screen"/>

<script type="text/javscript">
function getCC(){
    $('#create-cat').slideUp();
}
</script>
</head>
<body>

  <div class="container">
    <div class="row">
      <br>
      <a href=../index.php><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Index</a>
      <a href=logout.php><span class="glyphicon glyphicon-road" aria-hidden="true"></span> Logout</a>
      <hr>
    </div>
    <div class="row" style="margin-top:5%">
      <h1>Generate Thumbnails</h1>
      <p>Thumbnails are generated at the level of categories (not individual gallery/albums).</p>
      <form action="../make_thumbnail.php" id="thumbnailform" method="GET">
        <label for="thumbs">Category : </label>
        <select class="form-control" style="width:50%;" form="thumbnailform" name="category">
          <?php
            foreach($categories as $category) {
              $cat = substr($category, 9);
              echo '<option value="'.$cat.'">' . ucfirst($cat) . '</option>';
              }
          ?>
          </select><br>
          <label for="overwrite">Overwrite:  </label>
          <input type="checkbox" name="overwrite" value="false"><br>
          <br>
          <input class="btn btn-success" type="submit" value="Create Thumbnails">
      </form>
    </div>
    <hr>
      <p>Uploading images through php (that is, HTTP) is slow and painful. It's a better idea, if you have access, to ignore these file-system crud forms in favor of directly uploading your albums using SFTP or something.</p>
      <p>Further, the code making up the `rest` API is probably broken because I don't use it or maintain it, and permissions are likely <i>broken</i>. <strong>Proceed with caution</strong></p>
    <hr>
    <div class="row" style="margin-top:5%">
      <div class="col-md-4" style="display:none">
        <ul class="list-unstyled">
          <li><a href=# onclick="getCC()">Create Category</a></li>
          <li><a href=# onclick="getCG">Create Gallery</a></li>
          <li><a href=# onclick="getUP">Upload Photography</a></li>
          <hr>
          <li><a href=# onclick="getDC">Delete Category</a></li>
          <li><a href=# onclick="getDG">Delete Gallery</a></li>
          <li></li>
        </ul>
      </div>
      <div class="col-md-4 admin-option" id="create-cat">
        <h1>Create Category</h1>
        <form action="../rest/create_category.php" method="post" enctype="multipart/form-data" id="catform">
        <label for="photos">Gallery : </label>
        <input class="form-control" type="text" name="category" placeholder="Category Name"><br>
        <input class="btn btn-success" type="submit" value="Create Category">
      </form>
    </div>
    <div class="col-md-4 admin-option" id="create-gall">
      <h1>Create Gallery</h1>
      <form action="../rest/create.php" id="galleryform" method="post">
        <label for="photos">Category : </label>
        <select class="form-control" form="galleryform" name="category">
          <?php
            foreach($categories as $category) {
              $cat = substr($category, 9);
              echo '<option value="'.$cat.'">';
              echo ucfirst($cat) . '</option>';
// TODO: fix syntax highlighting...
//$galleries = array_filter(glob('../media/'. $category .'/*'), 'is_dir');
            }
            echo '        </select><br>';
            echo '        <label for="dirname">Gallery : </label>';
          ?>
        <input class="form-control" type="text" name="gallery"
        placeholder="Gallery Name">
        <br>
        <input class="btn btn-success" type="submit" value="Create Gallery">
      </form>
    </div>
    <div class="col-md-4 admin-option" id="upload-phot">
      <h1>Upload Photographie</h1>
      <form action="../rest/upload.php" method="post" enctype="multipart/form-data" id="uploadform">
        <label for="photos">Select Photographs : </label>
        <input class="btn btn-default" type="file" name="files[]" multiple><br>
        <label for="photos">Category : </label>
        <select class="form-control" form="uploadform" name="category">
          <?php
            foreach($categories as $category) {
              $cat = substr($category, 9);
              echo '<option value="'.$cat.'">';
              echo ucfirst($cat) . '</option>';
            }
          ?>
        </select><br>
        <label for="photos">Gallery : </label>
        <input class="form-control" type="text" name="gallery" placeholder="Gallery Name - Must Already Exist"><br>
        <input class="btn btn-success" type="submit" value="Upload Images">
      </form>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4 admin-option" id="delete-cat">
      <h1>Delete Category</h1>
      <form action="../rest/delete.php" method="post">
        <label for="category">Category : </label>
        <input class="form-control" type="text" name="category" placeholder="This cannot be undone">
        <br>
        <input class="btn btn-danger" type="submit" value="Delete Directory!">
      </form>
    </div>
    <div class="col-md-4 admin-option" id="delete-gall">
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
    <div class="col-md-4 admin-option" id="instructions">
      <h1>Instructions</h1>
      <p>The Categories, Galleries, and Image filenames must not include spaces. When displayed, they a space will replace any '-' or '_' character.</p>
      <p>The Galleries are listed in reverse alphabetic/numeric order (so that if listed by year, the most recent will be on top. The galleries themselves will be sorted in normal alphabetic/numeric order.</p>
      <p>Depending on how your php.ini is configured on your server, uploading through the admin interface can be slow. Using rather a FTP client will be faster.</p>
    </div>
  </div>
</div>
<?php
  include "../footer.php";
?>
</body>
</html>
