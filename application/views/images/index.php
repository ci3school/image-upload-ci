<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	</head>
	<body>
		<div class="container">
			<div class="row">
				<form role="form" action="" method="POST" class="col-md-6" enctype="multipart/form-data">
					<br/>
					<?php if ($this->session->flashdata('msg')): ?>
						<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<?php echo $this->session->flashdata('msg'); ?>
						</div>
					<?php endif; ?>
					<?php if ($this->session->flashdata('error')): ?>
						<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<?php echo $this->session->flashdata('error'); ?>
						</div>
					<?php endif; ?>
					<h2>Upload Image</h2><br/>
					<div class="form-group">
						<label for="image">Image</label>
						<input id="image" name="image" type="file" class="" required>
						<?php echo form_error('image');?>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="upload" class="btn btn-primary" />
					</div>
				</form>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>
</html>