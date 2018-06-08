<?php $this->layout('adminlayout');?>
<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title">Editar Categorias</h3>
	</div>
	<!-- /.box-header -->
	<!-- form start -->

	<form action="<?=URL?>/category/update" method="POST" class="form-horizontal">
		<?php $this->insert("categories/partials/form"); ?>
		<div class="box-footer">
      <button type="submit" class="btn btn-info pull-right">Editar</button>
    </div>
	</form>

</div>