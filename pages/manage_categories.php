<?php
include_once 'login_check.php';
include_once 'db_helper.php';
include_once 'html_init.php';

if(empty(is_admin($_SESSION['login_user'])))
{
    header("location:login.php");
}
   // After submit button has been clicked, I do recursion
if(isset($_POST['add_category']) && isset($_POST['category_name']))
{
    create_category($_POST['category_name']);
}

?>
<body id="top">
  <!-- ####################################################################################################### -->
  <div class="wrapper">
	<?php include 'page_top.php'; ?>
  </div>
  <div class="wrapper col2">
	<?php include_once 'load_nav_menu.php';?>
  </div>
  <div class="wrapper col2">
	<!-- ####################################################################################################### -->
	<div class="wrapper">
	  <div class="container">
		<?php
		echo '
		<div class="fl_left">
		  <div style="padding-left: 101px;">
			<h1 style="color:black" > Create a category </h1>
			<form name="test" action="manage_categories.php" method="post" >
			  <input type="text" name="category_name" required>
			  <br>
			  <input id="test" name="add_category" type="submit" value="add category">
			</form>
		  </div>
		</div>

		<!-- manage categories-->
		<div class="fl_left">
		  <div style="padding-left: 101px;">
			<h1 style="color:black" >All  categories </h1>
			<table>
			  <tr>
				<th>ID</th>
				<th>Name</th>
				<th>Delete</th>
			  </tr>';
			  $result = get_all_categories();
			  $rows   = array();
			  while($rows = $result->fetch_assoc())
			  {
			  $id   = $rows['id'];
			  $name = $rows['name'];
			  echo "
			  <tr>
				<td>$id</td>
				<td>$name</td>
				<td>  <a href='delete_category.php?id=$id&category_name=$name'>Delete</a>  </td>
			  </tr>";
			  }
			  echo '
			</table>
		  </div>
		</div>
		<br class="clear" /> ';
		?>

	  </div>
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
