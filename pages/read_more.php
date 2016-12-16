<?php
include 'db.php';
$result = get_a_post($_POST['post_id']);
echo $result->fetch_assoc()['title'];
?>