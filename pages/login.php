<?php
include 'login_check.php';

if (is_logged())
{
    header("location:index.php");
}
include 'html_init.php'; ?>
<body id="top">
        <div class="wrapper">
     <?php include 'page_top.php'; ?>
</div>
<div class="wrapper col2">
  <?php include 'menu_prelogin.php';?>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div class="container">
     <?php include 'login_form.php'; ?>
     </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
     <?php include 'footer.php';?>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col8">
     <?php include 'copyright.php'; ?>
</div>
</body>
</html>