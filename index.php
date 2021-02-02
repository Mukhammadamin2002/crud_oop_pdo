<?php include ('./includes/class-autoload.inc.php');?>
<?php require_once ('./templates/header.php');?>

<?php 

 ?>


   <!-- Button trigger modal -->
<div class="text-center">
	<button type="button" class="my-5 btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPostModal">
  Create Post
</button>
</div>

<!-- Modal -->
<div class="modal fade" id="addPostModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	<!--form input-->
        <form action="post.process.php" method="POST">
        	<div class="form-group">
        		<label for="">Title: </label>
        		<input type="text" name="post-title" class="form-control" required>
        	</div>

    		<div class="form-group">
        		<label for="">Content: </label>
        		<textarea type="text" name="post-content" class="form-control" required></textarea>
        	</div>

    		<div class="form-group">
        		<label for="">Author: </label>
        		<input type="text" name="post-author" class="form-control" required>
        	</div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	        <button type="submit" name="submit" class="btn btn-primary">Add Post</button>
	      </div>

        </form>
      </div>
    </div>
  </div> 
</div>

<div class="row">
	<?php $posts = new Posts(); ?>
	<?php if($posts->getPost()) : ?>
		<?php foreach($posts->getPost() as $post) : ?>
			<div class="col-md-6 mt-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title"><?= $post['title'];  ?></h5>
							<p class="card-text">
							<?php 
							echo $post['body'];
							 ?>
							</p>
						<h6 class="card-subtitle text-muted text-right">Author: <?= $post['author'] ?></h6>
						<a href="editForm.php?id=<?= $post['id']; ?>" class="btn btn-warning mt-2">Edit</a>
						<a href="post.process.php?id=<?= $post['id']?>&send=del" class="btn btn-danger mt-2">Delete</a>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	<?php else : ?>
	<p class="mx-auto mt-5 text-center">post is empty</p>
 	<?php endif; ?>
</div>

<?php require_once ('./templates/footer.php');?>
