<?php $this->layout('adminlayout');?>


<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Enviar mensaje</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?=URL?>/message/store" method="POST" class="form-horizontal">
               <div class="box-body">
                  <div class="form-group">
                  <label  class="col-sm-2 control-label">Subject</label>

                  <div class="col-sm-10">
                    <input type="text" name="subject" class="form-control"  placeholder="subject">
                  </div>
                  </div>

                     <div class="form-group">
                  <label  class="col-sm-2 control-label">Body</label>

                  <div class="col-sm-10">
                    <textarea name="body" class="form-control" ></textarea>
                  </div>
                  </div>

                    <div class="form-group">

               <label>Users</label>
          <br>

          
          <?php foreach ($users as $user ): ?>

            <label>
              <input <?=(isset($user->id) && $user->id == $id)? 'checked':'' ;?>  type="checkbox" id="<?= $user->id ?>" name="users[]" class="flat-red" value="<?= $user->id ?>" >
              <?= $user->name ?>
            </label>
            
          <?php endforeach ?>

        </div>
                  


                
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Crear</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>