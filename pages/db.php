<?php
include 'db_connection.php';

function create_new_post($information, $category, $title)
{
    $path = "/temp/path_to_img/".$category."/".$title;
    session_start();
    $author = $_SESSION['login_user'];
    $current_date = date("Y/m/d");
    $query="INSERT INTO posts (title,information,path,category,date,author) VALUES ('"
          .$title."','"
          .$information."','"
          .$path."','"
          .$category."','"
          .$current_date."','"
          .$author."')";

    $result = DB::get()->query($query);
    return $result;
}

function get_all_posts()
{
    $result = DB::get()->query(
        "SELECT * FROM posts");
    // $rows[] = '';
    //while($rows = $result->fetch_assoc()){
    //    echo $rows['title'];
    //}
    return $result;
}

function select_user($email)
{
    $result = DB::get()->query(
        "SELECT * FROM users WHERE `email` = '$email'");
    return $result;
}

function login_check($email, $password)
{
    $exists = false;
    $result = select_user($email);
    $rows[] = '';
    while($rows = $result->fetch_assoc()){
        if($rows['password'] == $password) {
            $exists=true;
        }
    }
    return $exists;
}

function is_registered($email)
{
    $exists = false;
    $result = select_user($email);
    $rows[] = '';
    while($rows = $result->fetch_assoc()){
        if($rows['email'] == $email) {
            $exists=true;
        }
    }
    return $exists;
}

function register_user($password,
                       $email,
                       $firsname,
                       $lastname,
                       $address)
{
    if(!is_registered($email))
    {
        $query="INSERT INTO users (password,email,firstname,lastname,address) VALUES ('"
              .$password."','"
              .$email."','"
              .$firsname."','"
              .$lastname."','"
              .$address."')";

        $result = DB::get()->query($query);

        if($result == TRUE){
            return TRUE;
        }
        else
        {
            return "Error while inserting into db";
        }
    }
    else
    {
        return "Already registered";
    }
}
?>