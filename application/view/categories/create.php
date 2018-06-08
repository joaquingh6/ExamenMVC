
<?php $this->layout('adminlayout');?>
<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Crear Categorias</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form action="<?=URL?>/category/store" method="POST" class="form-horizontal">
              <?php $this->insert("categories/partials/form"); ?>
              <div class="box-footer">
               <button type="submit" class="btn btn-info pull-right">Crear</button>
              </div>
            </form>
          </div>