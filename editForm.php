<?php 
	require_once('./templates/header.php');
	include("./includes/class-autoload.inc.php");

	$posts = new Posts();
	$post = $posts->editPost($_GET['id']);
	$id = $post['id'];
	$title = $post['title'];
	$body = $post['body'];
	$author = $post['author'];
?>

<div class="text-center my-4">
	<h3>Editing Post</h3>
</div>

<div class="row">
	<div class="col-md-7 mx-auto">
		      	<!--form input-->
        <form action="post.process.php?id=<?= $id; ?>" method="POST">
        	<div class="form-group">
        		<label for="">Title: </label>
        		<input type="text" name="post-title" class="form-control" value="<?= $title; ?>" required>
        	</div>

    		<div class="form-group">
        		<label>Content: </label>
        		<textarea type="text" name="post-content" class="form-control" required><?= $body; ?></textarea>
        	</div>

    		<div class="form-group">
        		<label for="">Author: </label>
        		<input type="text" name="post-author" class="form-control" value="<?= $author; ?>" required>
        	</div>
	     
	        <a href="index.php" type="button" class="btn btn-secondary mt-2">Close</a>
	        <button type="submit" name="update" class="btn btn-primary mt-2">Update Post</button>
	     
        </form>
	</div>
</div>

<?php 
	require_once('./templates/footer.php');
 ?>


