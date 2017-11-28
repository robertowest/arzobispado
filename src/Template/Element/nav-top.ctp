<nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>

    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
<?php
if ( isset($current_user) && isset($current_user['username']) )
{
?>
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <?php echo $this->Html->image('usuarios/foto'.$current_user['id'].'.jpg',
                                                  array('class' => 'user-image', 'alt' => 'User Image')); ?>
                    <span class="hidden-xs"><?= $current_user['username'] ?></span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <?php echo $this->Html->image('usuarios/foto'.$current_user['id'].'.jpg',
                                                      array('class' => 'img-circle',
                                                            'alt' => 'User Image')); ?>
                        <p>
                            <?= $current_user['apellido'].', '.$current_user['nombre'] ?>
                            <small>Miembro desde <?= $current_user['created'] ?></small>
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                            <?= $this->Html->link('Perfil',
                                    ['controller' => 'usuarios', 'action' => 'profile', $current_user['id']],
                                    ['escape' => false, 'class' => 'btn btn-default btn-flat']) ?>
                        </div>
                        <div class="pull-right">
                            <?= $this->Html->link('<i class="fa fa-sign-out"></i> '.'Salir',
                                    ['controller' => 'usuarios', 'action' => 'logout'],
                                    ['escape' => false, 'class' => 'btn btn-default btn-flat']) ?>
                        </div>
                    </li>
                </ul>
            </li>
<?php
}
else
{
?>
            <li class="dropdown user user-menu">
                <?= $this->Html->link('<i class="fa fa-sign-in"></i> '.'Iniciar',
                                        ['controller' => 'usuarios', 'action' => 'login'],
                                        ['escape' => false]) ?>
            </li>
<?php
}
?>

        </ul>
    </div>

 </nav>
