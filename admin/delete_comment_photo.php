<?php include("includes/init.php"); ?>

<?php if(!$session->is_signed_in()) {redirect("login.php");}?>

<?php

if (empty($_GET['id'])) {
  redirect("comment.php");
  exit();
}

$Comment = Comment::find_by_id($_GET['id']);

if ($Comment) {
  $Comment->delete();
  redirect("comment_photo.php?id={$Comment->photo_id}");
} else {
  redirect("comment_photo.php?id={$Comment->photo_id}");
}

 ?>
