<?php
   include_once 'login_check.php';
   include_once 'db_helper.php';
   include_once 'html_init.php';

if(empty(is_admin($_SESSION['login_user'])))
{
    header("location:login.php");
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
		<!-- manage users-->
		<div class="fl_left">
		  <div style="padding-left: 101px;">
			<h1 style="color:black" >All  categories </h1>
			<table>
			  <tr>
				<th>ID</th>
				<th>FirstName</th>
                <th>LastName</th>
				<th>Email</th>
			  </tr>';
              $result = select_from_user(array(), array());
			  $rows   = array();
			  while($rows = $result->fetch_assoc())
			  {
                  $id    = $rows['id'];
                  $fname = $rows['firstname'];
                  $lname = $rows['lastname'];
                  $email = $rows['email'];
                  $admin = $rows['admin'];
                  $del   = "<td> <a href='delete_user.php?id=$id'>Delete</a>  </td>";
                  if($admin == 1)
                  {
                      $del = "<td> <a href='#'>Delete</a> </td>";
                  }
                  echo "
			      <tr>
				    <td>$id</td>
				    <td>$fname</td>
                    <td>$lname</td>
                    <td>$email</td>
				    $del
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
