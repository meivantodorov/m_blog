<?php
session_start();

function is_logged()
{
    if(isset($_SESSION['login_user']))
    {
        return true;
    }
    return false;
}
?>