<?php
session_start();
include 'db.php';
if (isset($_POST['login_btn']))
{
    if (empty($_POST['email']) ||
        empty($_POST['password']))
    {
        header("location:login.php");
    }
    elseif(login_check($_POST['email'], $_POST['password']))
    {
        $_SESSION['login_user']=$_POST['email'];
        header("location:index.php");
    }else
     {
        header("location:login.php");
     }
}
?>