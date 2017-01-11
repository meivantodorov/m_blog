<?php
include_once 'db_helper.php';

$result  = get_all_categories();
$rows    = array();
$counter = 0;
while($rows = $result->fetch_assoc())
{
    $class = "fl_left";
    if ($counter % 2 == 0) {
        $class = "fl_right";
    }
    $id   = $rows['id'];
    $name = $rows['name'];
    //echo "";
    show_category($class,$rows['name'],$rows['id']);
    $counter++;

}

echo ' <br class="clear" />';

function show_category($class, $name, $id)
{
    $p = "<p><strong><a href='list_all_posts.php?category_id=$id'>$name</a></strong></p>";
    echo '
     <div class='.$class.'>
        <img src="../images/demo/100x100.gif" alt="" />
        '.$p.'
     </div>';
}
?>