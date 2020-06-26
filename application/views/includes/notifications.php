<?php if ($this->session->flashdata('alert')): $time = time();  ?>

	<section style="padding: 15px;">
		<div class="alert alert-<?php echo $this->session->flashdata('alert-type') ?>" id="alert-<?php echo $time ?>">
			<p><?php echo $this->session->flashdata('alert') ?></p>
		</div>
	</section>

	<script>
		setTimeout(function() {
			$('#alert-<?php echo $time ?>').hide().remove();
		}, 5000)
	</script>
	
<?php endif ?>