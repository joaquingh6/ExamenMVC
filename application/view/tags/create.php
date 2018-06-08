<?php $this->layout('adminlayout');?>


<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Crear Categorias</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?=URL?>/tag/store" method="POST" class="form-horizontal">
               <div class="box-body">
                  <div class="form-group">
                  <label  class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control"  placeholder="Name">
                  </div>
                  </div>
                  


                
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Crear</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>