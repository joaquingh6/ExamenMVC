  <figure class="logo"><img src="<?= URL ?>img/logo.png" alt=""></figure>
            <nav>
                <ul class="container-flex space-center list-unstyled">
                   <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'Administrador'): ?>
                    
                    <li><a href="/" class="text-uppercase">Home</a></li>
                    <li><a href="/admin/posts" class="text-uppercase">Posts</a></li>
                    <li><a href="/admin/tags" class="text-uppercase">Tags</a></li>
                    <li><a href="/admin/categories" class="text-uppercase">Categorias</a></li>
                    

                    
                <?php endif ?>



                <li><a href="/" class="text-uppercase">Home</a></li>
           


                <?php if (isset($_SESSION['user_name'])): ?>



                     <li><a href="/post/posts" class="text-uppercase">Posts</a></li>
                    <li><a href="/login/salir" class="text-uppercase">Cerrar Session</a></li>



                  <?php else: ?>

                    <li><a href="/login" class="text-uppercase">Login</a></li>

                <?php endif ?>
                </ul>
            </nav>