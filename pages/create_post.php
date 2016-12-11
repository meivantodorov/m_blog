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
$result = create_new_post($_POST['information'],
                              $_POST['category'],
                              $_POST['title']);
echo "post result : $result";
}
}
?>