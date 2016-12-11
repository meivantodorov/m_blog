<?php
include 'db.php';
$result = get_all_posts();
$rows[] = '';

while($rows = $result->fetch_assoc()){
    print_post($rows['title'], $rows['path'], $rows['information']);
}
function print_post($title,$img,$information)
{
    echo '<li><img src="../images/demo/100x100.gif" alt="" />
            <p><strong><a href="#">'.$title.'.</a></strong> '.$information.'</p>
          </li>';
}
?>