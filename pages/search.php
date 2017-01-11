<?php
include 'html_init.php'; ?>
<body id="top">
    <div class="wrapper">
     <?php include 'page_top.php'; ?>
</div>
<div class="wrapper col2">
  	<?php include 'load_nav_menu.php';?>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div class="container">
     <?php
    if(isset($_POST['search_field']))
    {
        include_once 'db_helper.php';
        include_once 'validation.php';

        $search = $_POST['search_field'];
        $result = select_search($search);
        if(!empty_rows($result))
        {
            $rows[]  = '';
            while($rows = $result->fetch_assoc())
            {
                $title   = $rows['title'];
                $post_id = $rows['id'];
                echo "<li><a href='read_more.php?id=$post_id'>$title</a></li>";
            }
        }
    }
    ?>
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

?>