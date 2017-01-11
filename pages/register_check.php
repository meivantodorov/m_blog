<?php
if (isset($_POST['register_btn']))
{
    if (empty($_POST['email'])     ||
        empty($_POST['password'])  ||
        empty($_POST['firstname']) ||
        empty($_POST['lastname'])  ||
        empty($_POST['address']))
    {
        header("location:register.php");
    }
    elseif($_POST['password'] != $_POST['password_again'] )
    {
        header("location:register.php");
    }
    elseif( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    {
        header("location:register.php");
    }
    else
    {
        include_once "db_helper.php";
        $result = register_user(
            mysql_real_escape_string($_POST['password']),
            mysql_real_escape_string($_POST['email']),
            mysql_real_escape_string($_POST['firstname']),
            mysql_real_escape_string($_POST['lastname']),
            mysql_real_escape_string($_POST['address']));
        if($result)
        {
            header("location:login.php");
        }
        else
        {
            echo "register result : $result";
        }
    }
}
?>