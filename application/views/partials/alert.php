<?php $alert = $this->session->flashdata('alert');
		if ($alert) {
?>
	<div class="alert alert-<?= $alert['style'] ?>">
		<?= $alert['message'] ?>
	</div>
<?php } ?>