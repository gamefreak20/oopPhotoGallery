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
  redirect("comments.php");

} else {

  redirect("comments.php");

}

 ?>
