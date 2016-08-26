<?php include('add_post_modal.php') ?>

<div class="col-md-12">
	<div style="margin-bottom: 20px">
		<button type="button" class="btn btn-default" data-toggle="modal" data-target="#add-post-modal">
		  Add Post
		</button>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="panel-title">
				All Posts
			</div>
		</div>
		<div class="panel-body">
			<?php foreach ($posts as $post) { ?>
				<h2> <?= $post->id ?> <?= $post->title ?> </h2>
				<blockquote class="blockquote-reverse">
					<p> <?= $post->content ?> </p>
					<footer><?= $post->first_name ?> <?= $post->last_name ?></footer>
				</blockquote>
			<?php } ?>
		</div>
		<div class="panel-footer">
			<?= $pagination ?>
		</div>
	</div>
</div>