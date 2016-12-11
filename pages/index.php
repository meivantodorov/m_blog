<?php include 'html_init.php'; ?>
<body id="top">
    <div class="wrapper">
		<?php include 'page_top.php'; ?>
	</div>
    <div class="wrapper col2">
		<?php
		include 'load_nav_menu.php';
		?>
	</div>
	<!-- ####################################################################################################### -->
	<div class="wrapper">
		<div class="container">
			<?php include 'targeted.php' ;?>
		</div>
		<div class="column">
			<?php include 'latestposts.php'; ?>
		</div>
		<br class="clear" />
	</div>
	</div>
	<!-- ####################################################################################################### -->
	<div class="wrapper">
		<div id="hpage_cats">
			<?php include 'categories.php'; ?>
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
