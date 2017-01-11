<?php
include_once 'login_check.php';
include_once 'db_helper.php';
$post_id = '';
if(isset($_GET['id']))
{
    $post_id = $_GET['id'];
}
else
{
    $post_id = $_POST['post_id'];
}
if(!is_logged())
{
    header("location:login.php");
}

update_visited_post($post_id);
include 'html_init.php';
?>
<body id="top">
  <!-- ####################################################################################################### -->
  <div class="wrapper">
	<?php include 'page_top.php'; ?>
  </div>
  <div class="wrapper col2">
	<?php include_once 'load_nav_menu.php';?>
  </div>
  <div class="wrapper col2">
	<!-- ####################################################################################################### -->
	<div class="wrapper">
	  <div class="container">
		<?php

		   //        ---------- Display the coment form view ------------
       $db_post_result = select_from_posts(array(),
                                           array("id" =>
                                                 $post_id));
        $rows[] = '';
		while($rows = $db_post_result->fetch_assoc())
        {
            update_prefered_categories(
                get_user_id_by_email($_SESSION['login_user']), $rows['category']);
            $post_id     = $rows['id'];
            $post_path   = $rows['path'];
            $title       = $rows['title'];
            $information = $rows['information'];
            $author      = $rows['author'];
            $date        = $rows['date'];
            if(is_admin($_SESSION['login_user']))
            {
                echo "<li><a href='delete_post.php?post_id=$post_id&post_path=$post_path'>delete post</a></li>";
            }
            echo "<li><a href='#'>$title</a></li>";
            echo "<li><a href='#'>$information</a></li>";
            echo "<li><a href='#'>$author</a></li>";
            echo "<li><a href='#'>$date</a></li>";

            echo "<li><a href='#'>Comment</a></li>";
            echo '<form name ="submit"
					action="create_comment.php"
                    method="POST">
          <input name="post_id" type="hidden" value='.$post_id.' />
          <textarea name="comment" rows="4" cols="50"></textarea> </br> </br>
          <input type="submit" name="create_comment_btn" id="btn_post"/>
        </form>';
        }
		//        ---------- Display all coments view ------------
		$db_comment_result = get_all_comments($post_id);
		$rows = '';

		while($rows = $db_comment_result->fetch_assoc())
		{
            $comment_id = $rows['id'];
            $comment = $rows['comment'];
            $post_user_id = $rows['user'];
            $username = get_username_by_email($_SESSION['login_user']);
            $date = $rows['date'];
            $vote = $rows['vote'];
            echo "<li><a href='#'>----------------------------------------</a></li>";
            echo "<li><a href='#'>$username</a></li>";
            echo "<li><a href='#'>$comment</a></li>";
            echo "<li><a href='#'>$date</a></li>";
            $current_user_id = get_user_id_by_email($_SESSION['login_user']);
            if(!already_voted($current_user_id, $comment_id) AND $post_user_id != $current_user_id)
            {
                echo "<li><a href='vote.php?comment_vote_up=$comment_id&post_id=$post_id&user_id=$current_user_id'>+</a></li>";
                echo "<li><a href='vote.php?comment_vote_down=$comment_id&post_id=$post_id&user_id=$current_user_id'>-</a></li>";
            }
            echo "<li><a href='#'>$vote</a></li>";
            if(is_admin($_SESSION['login_user']))
            {
                echo "<li><a href='vote.php?delete_comment=$comment_id&post_id=$post_id'>delete post</a></li>";
            }
		}
		?>

	  </div>
	</div>
	<!-- ####################################################################################################### -->
	<div class="wrapper">
		<?php include_once 'footer.php';?>
	</div>
	<!-- ####################################################################################################### -->
	<div class="wrapper col8">
		<?php include_once 'copyright.php'; ?>
	</div>
</body>
</html>
