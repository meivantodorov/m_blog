<?php include_once 'html_init.php'; ?>
<body id="top">
    <div class="wrapper">
		<?php include_once 'page_top.php'; ?>
	</div>
    <div class="wrapper col2">
		<?php
		include_once 'load_nav_menu.php';
		?>
	</div>
	<!-- ####################################################################################################### -->
	<div class="wrapper">
		<div class="container">
			<?php include_once 'targeted.php' ;?>
		</div>
		<div class="column">
			<?php include_once 'latestposts.php'; ?>
		</div>
		<br class="clear" />
	</div>
	</div>
	<!-- ####################################################################################################### -->
	<div class="wrapper">
		<div id="hpage_cats">
			<?php include_once 'categories.php'; ?>
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
