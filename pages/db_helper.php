<?php

include_once 'db.php';
include_once 'validation.php';

// ================================== //
// ------------  API  --------------- //
// ================================== //


// ------------ Search Selects ---------------
function select_search($searchText)
{
    $query =
           "SELECT * FROM posts WHERE `title` LIKE '%$searchText' OR
                                      `information` LIKE '%$searchText'";
    $result = DB::get()->query($query);
    return $result;
}

// ------------ Users Selects ---------------

function select_from_user($c, $w)
{
    $query  = build_select_query($c,$w);
    $result = select("users", $query[0], $query[1]);
    return $result;
}

function is_admin($user)
{
    $is_admin = false;
    $result   = select("users", "", "`email` = '$user'");
    $rows[]   = '';
    while($rows = $result->fetch_assoc())
    {
        if($rows['admin'] == 1)
        {
            $is_admin = true;
        }
    }
    return $is_admin;
}

function login_check($email, $password)
{
    $exists = false;
    $hashed_password = hash('sha256', $password);
    $result = select_from_user(array(),
                               $w=["email"    => $email]);
    $rows   = array();
    while($rows = $result->fetch_assoc()){
        if($rows['password'] == $hashed_password) {
            $exists=true;
        }
    }
    return $exists;
}

function get_user_id_by_email($email)
{
    $result = select("users",
                     "",
                     "`email` = '$email'");
    $rows   = array();
    $id     = '';
    while($rows = $result->fetch_assoc())
    {
        $id = $rows['id'];
    }
    return $id;
}

function get_username_by_email($email)
{
    $result   = select("users", "", "`email` = '$email'");
    $rows     = array();
    $username = '';
    while($rows = $result->fetch_assoc())
    {
        $username = $rows['firstname'];
    }
    return $username;
}

function is_registered($email)
{
    $exists = false;
    $result = select("users", "", "`email` = '$email'");
    $rows[] = '';
    while($rows = $result->fetch_assoc()){
        if($rows['email'] == $email) {
            $exists=true;
        }
    }
    return $exists;
}

// ------------ Users Inserts ---------------
function register_user($password,
                       $email,
                       $firstname,
                       $lastname,
                       $address)
{
    if(!is_registered($email))
    {
        $hashed_password = hash('sha256', $password);
        $result = insert("users",
                         array(
                             "password"  => "$hashed_password",
                             "email"     => "$email",
                             "firstname" => "$firstname",
                             "lastname"  => "$lastname",
                             "address"   => "$address"));

        if($result == TRUE)
        {
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

// ----------- Users Deletes ---------------------
function delete_user($id)
{
    DB::get()->query("DELETE FROM `users` WHERE `id` = '$id'");
}

// ----------- Categories Selects ----------------
function select_from_categoies($c, $w)
{
    $query  = build_select_query($c,$w);
    $result = select("categories", $query[0], $query[1]);
    return $result;
}

function get_category_name_by_id($id)
{
    $result = select_from_categoies(array(),
                                    array("id" => "$id"));
    return $result->fetch_assoc()['name'];
}

function get_all_categories()
{
    return select_from_categoies(array(),
                                 array());
}

function list_all_targeted_categories($user_id)
{
    $query = "SELECT p.id, p.title, p.information, p.path, p.category, p.date, p.author
              FROM posts p
              INNER JOIN prefered_categories
              ON p.category=prefered_categories.category_id AND prefered_categories.user_id=$user_id
              group by category
              order by prefered_categories.visits DESC
              LIMIT 5";
    return DB::get()->query($query);
}

// ------------ Categories Inserts ---------------------
function create_category($name)
{
    $query      = build_select_query(array(),array("name" => "$name"));
    $target_dir = "../images/posts/".$name;
    makedirss($target_dir);
    // check if the category already exists
    if(empty_rows(select("categories", $query[0], $query[1])))
    {
        insert("categories",
               array("name" => "$name"));
    }

}

// ------------ Category Delete Cascade --------------------------
function delete_category($category_id,$category_name)
{
    $posts_result = select_from_posts(array(),
                                      array("category" =>
                                            $category_id));

    $posts_arr = array();
    while($posts_arr = $posts_result->fetch_assoc())
    {
        $post_id  = $posts_arr['id'];
        $post_img = $posts_arr['path'];
        delete_post($post_id, $post_img);
    }
    delete_category_images($category_name);
    DB::get()->query("DELETE FROM `prefered_categories` WHERE `category_id` = '$category_id' ");
    DB::get()->query("DELETE FROM `categories`          WHERE `id`          = '$category_id' ");
}


// ----------- Prefered Categories ----------------
function select_from_pref_categoies($c, $w)
{
    $query  = build_select_query($c,$w);
    return select("prefered_categories",
                  $query[0], $query[1]);
}

function get_prefered_category($user_id, $category_id)
{
    $query  = build_select_query(array(),
                                 array("category_id" => "$category_id",
                                       "user_id"     => "$user_id"));
    return select("prefered_categories",
                  $query[0], $query[1]);
}

// ----------------- Comments Selects ---------------
function select_from_comments($c, $w)
{
    $query = build_select_query($c,$w);
    return select("comments",
                  $query[0], $query[1]);
}

function get_all_comments($post_id)
{
    return select_from_comments(array(),
                                array("post" => "$post_id"));
}

function get_a_comment($comment)
{
    return select_from_comments(array(),
                                array("id" => "$comment"));
}

// ----------------- Comments Inserts -----------------
function create_comment($post_id,$user_id,$comment)
{
    $current_date = date("Y/m/d");
    return insert("comments",
                  array("post"    => "$post_id",
                        "user"    => "$user_id",
                        "date"    => "$current_date",
                        "comment" => "$comment"));
}
// ---------------- Posts Selects----------------------
function select_from_posts($c, $w)
{
    $query = build_select_query($c,$w);
    return select("posts",
                  $query[0], $query[1]);
}

function get_all_posts()
{
    return select_from_comments(array(),
                                array());
}

function get_limited_posts($num)
{
    $result = DB::get()->query(
        "SELECT * FROM posts order by visits desc LIMIT $num");
    return $result;
}

function get_last_posts($num)
{
    $result = DB::get()->query(
        "SELECT * FROM posts order by date DESC LIMIT $num");
    return $result;
}

// ---------------- Posts Inserts ----------------------

function create_new_post($author,
                         $information,
                         $category,
                         $title,
                         $path)
{
    return insert("posts",
                  array("title"        => "$title",
                        "information"  => "$information",
                        "path"         => "$path",
                        "category"     => "$category",
                        "date"         =>  date("Y/m/d"),
                        "author"       => "$author" ));
}

// ------------ Posts Deletes -----------------------------------
function delete_post($post_id, $img_path)
{
    delete_post_image($img_path);
    DB::get()->query("DELETE FROM `posts`    WHERE `id`   = '$post_id' ");
    delete_from_thumbs($post_id);
    DB::get()->query("DELETE FROM `comments` WHERE `post` = '$post_id' ");
}

// ------------------- Thumbs Selects------------------
function select_from_thumbs($c, $w)
{
    $query = build_select_query($c,$w);
    return select("thumbs",
                  $query[0], $query[1]);
}

function already_voted($user_id, $comment_id)
{
    $voted  = false;
    $result = select_from_thumbs(array(),
                                 array("comment_id" => "$comment_id",
                                       "user_id"    => "$user_id"));
    $rows   = array();
    while($rows = $result->fetch_assoc())
    {
        $voted = true;
    }
    return $voted;
}

function update_visited_post($post_id)
{
    $result = select_from_posts(array(),
                                array("id" =>
                                      $post_id));
    $rows   = '';
    while($rows = $result->fetch_assoc())
    {
        visited_post($rows['id'],
                     $rows['title'],
                     $rows['information'],
                     $rows['path'],
                     $rows['category'],
                     $rows['date'],
                     $rows['author'],
                     $rows['visits']+1 );
    }
}

// ------------------  Thumbs Deletes ---------------------------
function delete_from_thumbs($post_id)
{
    $comments_result = select_from_comments(array(),
                                            array("post" => $post_id));
    $comments_arr = array();
    while($comments_arr = $comments_result->fetch_assoc())
    {
        $comment_id = $comments_arr['id'];
        DB::get()->query("DELETE FROM `thumbs`   WHERE `comment_id`   = '$comment_id' ");
    }
}


// ------------------- Prefered Category Inserts------------------
function create_prefered_category($user_id,$category_id)
{
    return insert("prefered_categories",
                  array("user_id"      => "$user_id",
                        "category_id"  => "$category_id"));
}

function update_prefered_categories($user_id,$category_id)
{
    $result = get_prefered_category($user_id,$category_id);
    $rows   = '';
    $done   = false;
    while($rows = $result->fetch_assoc()){
        prefered_categorie($rows['id'],
                           $category_id,
                           $rows['user_id'],
                           ($rows['visits']+1));
        $done = true;
    }
    if(!$done)
    {
        create_prefered_category($user_id,$category_id);
    }
}

function delete_comment($comment_id)
{
    DB::get()->query("DELETE FROM `comments` WHERE `id` = '$comment_id' ");
}

function vote_for_comment($vote,$current_user_id,$comment_id)
{
    $result   = get_a_comment($comment_id);
    $rows     = '';
    $new_vote = 1;
    if($vote == "down")
    {
        $new_vote = -1;
    }
    while($rows = $result->fetch_assoc())
    {
        vote_a_comment($rows['id'],
                       $rows['post'],
                       $rows['user'],
                       ($rows['vote']+($new_vote)),
                       $rows['date'],
                       $rows['comment'],
                       $current_user_id);
    }
}
// ================================== //
// ----  Internaal functions  ------- //
// ================================== //
function build_select_query($c, $w)
{
    $where_temp   = array();
    $query        = array();
    $columns      = '';
    $where        = '';
    foreach ($w as $k => $v)
    {
        array_push($where_temp, "`$k` = '$v'");
    }

    $where     = implode(" AND ", $where_temp);
    $columns   = implode(",", $c);
    array_push($query, $columns);
    array_push($query, $where);
    return $query;
}

//----------  Images Delete ------------------------------------
function delete_post_image($post_img)
{
       $post_img = substr($post_img, 2);
       $pwd      = str_replace("/pages","",getcwd());
       $path     = $pwd . $post_img;
       unlink($path);
}

function delete_category_images($category)
{
    $path = str_replace("/pages","/images/posts/",getcwd()).$category;
    m_rmdir($path);
}

function makedirss($dirpath) {
    return is_dir($dirpath) || mkdir($dirpath, 0777, true);
}

function m_rmdir($dir) {
   if (is_dir($dir)) {
     $objects = scandir($dir);
     foreach ($objects as $object) {
       if ($object != "." && $object != "..") {
         if (is_dir($dir."/".$object))
           m_rmdir($dir."/".$object);
         else
           unlink($dir."/".$object);
       }
     }
     rmdir($dir);
   }
 }

?>