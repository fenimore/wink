<?php
  $root = realpath($_SERVER["DOCUMENT_ROOT"]);

  $ini = parse_ini_file('wink.ini');
  $publisher = $ini["publisher"];

  // absolute href paths
  $index_href = "/index.php";
  $logout_href = "/auth/logout.php";
  $admin_href = "/auth/admin.php";
?>
<footer class="footer">
  <div class="container">
    <p class="text-muted">
      <a href="/index.php">Directory</a>
      | <a href="/about.php"><?php echo $publisher;?></a>
      | <a href=/auth/admin.php>
      <span class="glyphicon glyphicon-cloud-upload" aria-hidden="true">
      </span></a>
      | <a href="/auth/logout.php">Logout</a>
    </p>
  </div>
</footer>
