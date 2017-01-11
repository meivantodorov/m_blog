<?php
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

		<?php
		   $result = select_from_posts(array(),
           array("category" => $_GET['category_id']));
		$rows   = array();
		while($rows = $result->fetch_assoc())
		{
		$title = escape_whitespace($rows['path']);
		print_post($rows['id'],
        $rows['title'],
        $rows['information'],
        $rows['path']);
		}
		function print_post($id,$title,$information,$path)
		{
		echo '
        <p><strong><a href="#">'.$title.'.</a></strong> '.$information.'</p>
        <img src='.$path.' alt="">
        <form name="submit" action="read_more.php" method="POST">
          <input name="post_id"
                 type="hidden"
			     value='.$id.'/>  </br>
          <input type="submit" value="read more" name='.$title.'>
		</form>
        ';
		}

		?>
	  </div>
	</div>
	<!-- ####################################################################################################### -->

	<!-- ####################################################################################################### -->
	<div class="wrapper">
	  <div id="footer">
		<div class="footbox">
		  <h2>Lacus interdum</h2>
		  <ul>
			<li><a href="#">Lorem ipsum dolor</a></li>
			<li><a href="#">Suspendisse in neque</a></li>
			<li><a href="#">Praesent et eros</a></li>
			<li><a href="#">Lorem ipsum dolor</a></li>
			<li><a href="#">Suspendisse in neque</a></li>
			<li class="last"><a href="#">Praesent et eros</a></li>
		  </ul>
		</div>
		<div class="footbox">
		  <h2>Lacus interdum</h2>
		  <ul>
			<li><a href="#">Lorem ipsum dolor</a></li>
			<li><a href="#">Suspendisse in neque</a></li>
			<li><a href="#">Praesent et eros</a></li>
			<li><a href="#">Lorem ipsum dolor</a></li>
			<li><a href="#">Suspendisse in neque</a></li>
			<li class="last"><a href="#">Praesent et eros</a></li>
		  </ul>
		</div>
		<div class="footbox">
		  <h2>Lacus interdum</h2>
		  <ul>
			<li><a href="#">Lorem ipsum dolor</a></li>
			<li><a href="#">Suspendisse in neque</a></li>
			<li><a href="#">Praesent et eros</a></li>
			<li><a href="#">Lorem ipsum dolor</a></li>
			<li><a href="#">Suspendisse in neque</a></li>
			<li class="last"><a href="#">Praesent et eros</a></li>
		  </ul>
		</div>
		<div class="footbox">
		  <h2>Lacus interdum</h2>
		  <ul>
			<li><a href="#">Lorem ipsum dolor</a></li>
			<li><a href="#">Suspendisse in neque</a></li>
			<li><a href="#">Praesent et eros</a></li>
			<li><a href="#">Lorem ipsum dolor</a></li>
			<li><a href="#">Suspendisse in neque</a></li>
			<li class="last"><a href="#">Praesent et eros</a></li>
		  </ul>
		</div>
		<div class="footbox last">
		  <h2>Lacus interdum</h2>
		  <ul>
			<li><a href="#">Lorem ipsum dolor</a></li>
			<li><a href="#">Suspendisse in neque</a></li>
			<li><a href="#">Praesent et eros</a></li>
			<li><a href="#">Lorem ipsum dolor</a></li>
			<li><a href="#">Suspendisse in neque</a></li>
			<li class="last"><a href="#">Praesent et eros</a></li>
		  </ul>
		</div>
		<br class="clear" />
	  </div>
	</div>
	<!-- ####################################################################################################### -->
	<div class="wrapper">
	  <div id="socialise">
		<ul>
		  <li><a href="#"><img src="../layout/images/facebook.gif" alt="" /><span>Facebook</span></a></li>
		  <li><a href="#"><img src="../layout/images/rss.gif" alt="" /><span>FeedBurner</span></a></li>
		  <li class="last"><a href="#"><img src="../layout/images/twitter.gif" alt="" /><span>Twitter</span></a></li>
		</ul>
		<div id="newsletter">
		  <h2>NewsLetter Sign Up !</h2>
		  <p>Please enter your Email and Name to join.</p>
		  <form action="#" method="post">
			<fieldset>
			  <legend>Digital Newsletter</legend>
			  <div class="fl_left">
				  <input type="text" value="Enter name here&hellip;"
						 onfocus="this.value=(this.value=='Enter name here&hellip;')? '' : this.value ;" />
				  <input type="text" value="Enter email address&hellip;"
						 onfocus="this.value=(this.value=='Enter email address&hellip;')? '' : this.value ;" />
			  </div>
			  <div class="fl_right">
				  <input type="submit" name="newsletter_go" id="newsletter_go" value="&raquo;" />
			  </div>
			</fieldset>
		  </form>
		  <p>To unsubsribe please <a href="#">click here &raquo;</a>.</p>
		</div>
		<br class="clear" />
	  </div>
	</div>
	<!-- ####################################################################################################### -->
	<div class="wrapper col8">
	  <div id="copyright">
		<p class="fl_left">Copyright &copy; 2014 - All Rights Reserved - <a href="#">Domain Name</a></p>
		<p class="fl_right">Template by <a target="_blank" href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
		<br class="clear" />
	  </div>
	</div>
</body>
</html>
