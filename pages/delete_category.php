<?php
include_once 'db_helper.php';
if(isset($_GET['id']) AND isset($_GET['category_name']) )
{
    delete_category($_GET['id'], $_GET['category_name']);
}
header("location:manage_categories.php");
?>