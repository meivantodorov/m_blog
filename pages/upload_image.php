<?php
function upload($category, $title)
{
    $target_dir = "../images/posts/".$category."/".$title."/";
    makedirs($target_dir);
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    if(file_exists($target_file))
    {
        return false;
    }
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        move_uploaded_file( $_FILES['fileToUpload']['tmp_name'], $target_file);
        return $target_file;
    } else {
        return false;
    }
}

function makedirs($dirpath) {
    return is_dir($dirpath) || mkdir($dirpath, 0777, true);
}
?>