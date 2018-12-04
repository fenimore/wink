<?php
  $root = realpath($_SERVER["DOCUMENT_ROOT"]);

  $ini = parse_ini_file('wink.ini');
  $publisher = $ini["publisher"];
  $subdir = $ini["subdir"];
  // absolute href paths
  $index_href = "$subdir/index.php";
  $logout_href = "$subdir/auth/logout.php";
  $admin_href = "$subdir/auth/admin.php";
  $about_href = "$subdir/about.php";
?>
<footer class="footer">
  <div class="container">
    <p class="text-muted">
      <a href=<?php echo $index_href; ?>>Directory</a>
      | <a href=<?php echo $about_href; ?>><?php echo $publisher;?></a>
      | <a href=<?php echo $admin_href; ?>>
      <span class="glyphicon glyphicon-cloud-upload" aria-hidden="true">
      </span></a>
      | <a href=<?php echo $logout_href; ?> >Logout</a>
    </p>
  </div>
</footer>
