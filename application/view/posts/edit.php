
<?php $this->layout('adminlayout');?>



<div class="row">
	<!-- left column -->
	<div class="col-md-12">
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Quick Example</h3>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			
			<form action="<?= URL ?>post/update/<?=$post->id?>" method="POST" enctype="multipart/form-data">

					<?php $this->insert("posts/partials/form"); ?>
			
			</form>
			
		</div>