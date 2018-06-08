<?php $this->layout('adminlayout');?>

 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
              <a href="/post/create" class="btn btn-info pull-right">Crear</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Fecha</th>
                  <th>Name</th>
                  <th>user_id</th>
                  <th>Status</th>
                  <th>Borrar</th>
                  <th>Editar</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($posts as $post): ?>
                     <tr>
                  <td style="width: 8%;"><?= substr($post->updated_at, 0,10)  ?></td>
                  <td><?= $post->name ?></td>
                  <td><?= $post->user_id?></td>
                  <td><?= $post->status?></td>
                  <td> <a href="/post/delete/<?= $post->id ?>" onclick="return confirm('¿Seguro que quieres borrarlo?')">Borrar</a></td>
                  <td><a href="/post/edit/<?= $post->slug ?>">Editar</a></td>
                </tr>
                  <?php endforeach ?>
                
                </tbody>
              
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