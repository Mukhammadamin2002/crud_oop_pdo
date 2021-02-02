<?php 

include('includes/class-autoload.inc.php');

$posts = new Posts;

if(isset($_POST['submit'])) {
	$title = $_POST['post-title'];
	$body = $_POST['post-content'];
	$author = $_POST['post-author'];

	$posts->addPost($title, $body, $author);

	header("location: {$_SERVER['HTTP_REFERER']}");


	} else if(isset($_POST['update'])) {

	$id = $_GET['id'];
	$title = $_POST['post-title'];
	$body = $_POST['post-content'];
	$author = $_POST['post-author'];

	$posts->updatePost($title, $body, $author, $id);

	header("location: {$_SERVER['HTTP_ORIGIN']}/crud with PDO");

} else if($_GET['send'] === 'del') {

	$id = $_GET['id'];

	$posts->delPost($id);

	echo "<script>alert(Deleted)</script>";

	header("location: {$_SERVER['HTTP_ORIGIN']}/crud with PDO");

}