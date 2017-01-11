<?php

if(isset($_POST['create_comment_btn']))
{
    if (empty($_POST['comment']) ||
        empty($_POST['post_id']))
    {
        header("location:index.php");
    }
    else
    {
        include_once "db_helper.php";
        session_start();
        $rows    = array();
        $user_id = '';
        $result  =
                 create_comment($_POST['post_id'],
                                get_user_id_by_email(
                                    $_SESSION['login_user']),
                                $_POST['comment']);
        $post_id = $_POST['post_id'];
        header("location:read_more.php?id=$post_id");
    }
}
?>