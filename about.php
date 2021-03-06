<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['visitor']) && !isset($_SESSION['admin'])){
    header("Location:auth/login.php?role=visitor&redirect=../index.php");
    die();
}
$ini = parse_ini_file('wink.ini');
$publisher = $ini["publisher"];
$site = $ini["publisher_website"];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Wink - About</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Photo Gallery">
    <meta name="keywords" content="PHP, Photography">
    <meta name="author" content="Fenimore">
    <link rel="icon" href="favicon.ico">
    <link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-12">

      <h1><?php echo ucwords($publisher); ?>'s Photography</h1>
        <p>
        This website hosts some of the photographs I've taken during the last few years. You can find more information about me on my website: <?php echo $site; ?> :)
        </p>
    </div>
  </div>
</div>

<?php include("footer.php");?>

</body>
</html>
