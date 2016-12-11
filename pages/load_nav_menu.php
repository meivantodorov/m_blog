<?php
$menu = '';
session_start();
if(!empty($_SESSION['login_user']))
{
    $menu = 'menu_member.php';
}
else
{
    $menu = 'menu_prelogin.php';
}
include $menu;
?>