<header class="space-inter">
    <div class="container container-flex space-between">
        <figure class="logo"><img src="<?= URL ?>img/logo.png" alt=""></figure>
        <nav class="custom-wrapper" id="menu">
            <div class="pure-menu"></div>
            <ul class="container-flex list-unstyled">

              <li><a href="/" class="text-uppercase">Home</a></li>
              <li><a href="/post" class="text-uppercase">Posts</a></li>

              <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'Administrador'): ?>

                <li><a href="/admin" class="text-uppercase">Admin</a></li>

            <?php endif ?>

            <?php if (isset($_SESSION['user_name'])): ?>
            
             <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"><?=(isset($messages))? $messages : '0' ;?></span>
            </a></li>
             <li><a href="/login/salir" class="text-uppercase">Cerrar Session</a></li>
             <li><a href="/user/perfil" class="text-uppercase">Perfil</a></li>


         <?php else: ?>

            <li><a href="/login" class="text-uppercase">Login</a></li>

        <?php endif ?>

    </ul>
</nav>
</div>
</header>