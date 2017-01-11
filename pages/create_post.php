<?php

if(isset($_POST['create_post_btn']))
{
    if (empty($_POST['information']) ||
        empty($_POST['title']) ||
        empty($_POST['category']))
    {
        header("location:new_post.php");
    }
    else
    {
        include_once "db_helper.php";
        include_once "upload_image.php";
        include_once "validation.php";

        $post_check = select_from_posts(array(),
                                        array("title" =>
                                              $_POST['title']));
        if(!empty_rows($post_check)) {header("location:new_post.php"); exit;}
        if(!is_valid_dir($_POST['title'])) {header("location:new_post.php");}
        $category_name = get_category_name_by_id($_POST['category']);
        $title         = escape_whitespace($_POST['title']);
        $path_to_image = upload($category_name,$title);
        if(!$path_to_image) {header("location:index.php"); exit; }

        session_start();
        create_new_post($_SESSION['login_user'],
                        $_POST['information'],
                        $_POST['category'],
                        $_POST['title'],
                        $path_to_image);
        header("location:index.php");
    }
}
?>