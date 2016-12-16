<?php
include 'db.php';
$result = get_all_posts();
$rows[] = '';

while($rows = $result->fetch_assoc()){
    print_post($rows['id'],
               $rows['title'],
               $rows['information'],
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