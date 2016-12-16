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
        include "db.php";
        include "upload_image.php";

        $category_db_request = get_a_category($_POST['category']);
        $category_name = $category_db_request->fetch_assoc()['name'];
        $path_to_image = upload($category_name,$_POST['title']);

        if(!$path_to_image)
        {
            return false;
        }

        $result = create_new_post($_POST['information'],
                                  $_POST['category'],
                                  $_POST['title'],
                                  $path_to_image);
        echo "post result : $result";
    }
}
?>