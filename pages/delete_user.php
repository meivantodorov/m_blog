<?php
include_once 'db_helper.php';
if(isset($_GET['id']) )
{
    delete_user($_GET['id']);
}
header("location:manage_users.php");
?>