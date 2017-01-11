<?php
include 'db_connection.php';

// ------ Comments -----
function vote_a_comment($comment_id,
                        $post_id,
                        $user_id,
                        $vote,
                        $date,
                        $comment,
                        $current_user_id)
{
    $query="UPDATE `comments` SET
                               `post`    = '$post_id',
                               `user`    = '$user_id',
                               `vote`    = '$vote',
                               `date`    = '$date',
                               `comment` = '$comment' WHERE `id`='$comment_id' ";
    $result = DB::get()->query($query);

    $query="INSERT INTO thumbs (user_id, comment_id) VALUES ('"
          .$current_user_id."','"
          .$comment_id."')";
    $result = DB::get()->query($query);
    return $result;
}

// ----- Categories //
function delete_a_category($category_id)
{
    $query = "DELETE FROM `categories` WHERE `id` = '$category_id' ";
    $result = DB::get()->query($query);
    return $result;
}



// ------- Post -------
function delete_a_post($category_id)
{
    $query = "DELETE FROM `posts` WHERE `category` = '$category_id' ";
    $result = DB::get()->query($query);
    return $result;
}



function visited_post($post_id,
                      $title,
                      $information,
                      $path,
                      $category_id,
                      $date,
                      $author,
                      $visits)
{
    $query="UPDATE `posts` SET `title`='$title',
                               `information`='$information',
                               `path`='$path',
                               `category`='$category_id',
                               `date`='$date',
                               `author`='$author',
                               `visits`='$visits' WHERE `id`='$post_id' ";
    $result = DB::get()->query($query);
    return $result;
}

function prefered_categorie($id,$category_id,$user_id,$visits)
{
    $query="UPDATE `prefered_categories` SET
                               `user_id`='$user_id',
                               `category_id`='$category_id',
                               `visits`='$visits' WHERE `id`='$id' ";
    $result = DB::get()->query($query);
    return $result;
}


function select($tablename, $columns = "*", $where = "", $order = "", $limit = "")
{
    $columns = !empty($columns) && $columns != "*" ? $columns : "*";

    if (!empty($where)) {
        $where = 'WHERE '    .$where;
    }

    if (!empty($order)) {
        $order = 'ORDER BY ' .$order;
    }

    if (!empty($limit)) {
        $limit = 'LIMIT '    .$limit;
    }

    $query  = "SELECT $columns  FROM $tablename $where $order $limit";
    $result = DB::get()->query($query);
    return $result;
}

function insert($table, $fields)
{
    $query  = "INSERT INTO " . $table;
    $query .= " (`".implode("`, `", array_keys($fields))."`)";
    $query .= " VALUES ('".implode("', '", $fields)."') ";
    return DB::get()->query($query);
}

?>