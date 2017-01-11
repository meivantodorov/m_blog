<?php
include_once 'db.php';
include_once "validation.php";
$result = get_last_posts(2);
$rows[] = '';

echo '<h2> Latest posts </h2>';

while($rows = $result->fetch_assoc())
{
    $title = escape_whitespace($rows['path']);
    print_post($rows['id'],
               $rows['title'],
               substr($rows['information'], 0, 20),
               $rows['path']);
}
function print_post($id,$title,$information,$path)
{
    echo '
           <p><strong><a href="#">'.$title.'.</a></strong> '.$information.'</p>
           <img src='.$path.' alt="">
           <form name="submit" action="read_more.php" method="POST">
              <input name="post_id"
                     type="hidden"
			    	 value='.$id.'/>  </br>
              <input type="submit" value="read more" name='.$title.'>
		   </form>
         ';
}
?>
