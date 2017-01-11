<?php
include_once 'db_helper.php';
if(isset($_GET['post_id']) AND isset($_GET['post_path']) )
{
    Delete_post($_GET['post_id'], $_GET['post_path']);
}
header("location:index.php");
?>