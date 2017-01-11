<?php
include_once 'login_check.php';
$menu = '';

//session_start();
if(is_logged())
{
    include_once 'db.php';
    include_once 'db_helper.php';
    $menu = 'menu_member.php';
    if(is_admin($_SESSION['login_user']))
    {
        $menu = 'menu_admin.php';
    }
}
else
{
    $menu = 'menu_prelogin.php';
}
include $menu;
?>