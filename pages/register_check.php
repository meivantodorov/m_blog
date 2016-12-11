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
    else
    {
        include "db.php";
        $result = register_user($_POST['password'],
                                $_POST['email'],
                                $_POST['firstname'],
                                $_POST['lastname'],
                                $_POST['address']);
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