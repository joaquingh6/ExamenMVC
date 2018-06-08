<?php $this->layout('adminlayout');?>

 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
              <a href="/tag/create" class="btn btn-info pull-right">Crear</a>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Borrar</th>
                  <th>Message</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($users as $user): ?>
                     <tr>
                  <td><?= $user->id ?></td>
                  <td><?= $user->name ?></td>
                  <td><?= $user->email ?></td>
                  <td> <a href="/user/delete/<?= $user->id ?>"onclick="return confirm('¿Seguro que quieres borrarlo?')"  class="btn btn-sn">Borrar</a></td>
                  <td><a href="/message/create/<?= $user->id ?>">Message</a></td>
                </tr>
                  <?php endforeach ?>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>