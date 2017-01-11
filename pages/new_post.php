<?php
include_once 'login_check.php';
if(!is_logged())
{
    header("location:login.php");
}
include 'html_init.php';
?>
<body id="top">
  <!-- ####################################################################################################### -->
  <div class="wrapper">
	<?php include 'page_top.php'; ?>
  </div>
  <div class="wrapper col2">
	<?php include 'load_nav_menu.php';?>
  </div>
  <div class="wrapper col2">
	<!-- ####################################################################################################### -->
	<div class="wrapper">
	  <div class="container">
		<form name="submit" action="create_post.php" method="POST" enctype="multipart/form-data">
		  <input name="title"
				 type="text"
                 placeholder="Title"
				 value="" requred>
		  <p>
            <h3 style='color:black'>  Select a category </h3>
			<select name="category">
			  <?php include_once 'db.php';
					$categories[] = '';
					$result = get_all_categories();
					while($categories = $result->fetch_assoc()){
                        echo "<option value=".$categories['id'].">". $categories['name']."</option>";
			  }
			  ?>
			</select>
			<br> <br>
             <h3 style='color:black'>  Select image </h3>
			<input type="file" name="fileToUpload" id="fileToUpload" required>
		  </p>  </br> </br>
		  <textarea name="information" rows="4" cols="50" requred ></textarea> </br>
		  <input type="submit" name="create_post_btn" id="btn_post"/>
		</form>
	  </div>
	</div>
	<!-- ####################################################################################################### -->

	<!-- ####################################################################################################### -->

	</div>
	<!-- ####################################################################################################### -->
    <div class="wrapper">
		<?php include_once 'footer.php';?>
	</div>
	<!-- ####################################################################################################### -->
	<div class="wrapper col8">
		<?php include_once 'copyright.php'; ?>
	</div>
</body>
</html>
