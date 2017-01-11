<?php

include_once 'db_helper.php';

if(isset($_GET['comment_vote_up']) &&
   isset($_GET['post_id']) &&
   isset($_GET['user_id']))
{
    $comment_id = $_GET['comment_vote_up'];
    $post_id    = $_GET['post_id'];
    $user_id    = $_GET['user_id'];
    vote_for_comment("up", $user_id, $comment_id);
    header("location:read_more.php?id=$post_id");
}
if(isset($_GET['comment_vote_down']) &&
   isset($_GET['post_id']) &&
   isset($_GET['user_id']) )
{
    $comment_id = $_GET['comment_vote_down'];
    $post_id    = $_GET['post_id'];
    $user_id    = $_GET['user_id'];
    vote_for_comment("down",$user_id,$comment_id);
    header("location:read_more.php?id=$post_id");
}
if(isset($_GET['delete_comment']) &&
   isset($_GET['post_id']))
{
    $comment_id = $_GET['delete_comment'];
    $post_id    = $_GET['post_id'];
    delete_comment($comment_id);
    header("location:read_more.php?id=$post_id");
}
?>