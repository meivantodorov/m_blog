<?php
include_once 'db_helper.php';
$result = '';

if(isset($_SESSION['login_user']))
{
    $result =
            list_all_targeted_categories(
                get_user_id_by_email($_SESSION['login_user']));
}
else
{
    $result = get_limited_posts(5);
}

$rows[] = '';

echo ' <div class="content">
         <div id="featured_slide">
            <ul id="featurednews">';
while($rows = $result->fetch_assoc())
{
    print_targeted_posts($rows['id'],
                         $rows['title'],
                         substr($rows['information'], 0, 20),
                         $rows['path']);
}
echo '       </ul>
          </div>
        </div>';
function print_targeted_posts($id,$title,$information,$path)
{
echo '
          <li><img src='.$path.' alt="" />
            <div class="panel-overlay">
              <h2>'.$title.'</h2>
              <p>'.$information.'<br />
               <form name="submit" action="read_more.php" method="POST">
                   <input name="post_id"
                          type="hidden"
			    	      value='.$id.'/>  </br>
                   <input type="submit" value="Continue Reading &raquo;" name="read_more">
		       </form>
            </div>

          </li>
';
}
?>