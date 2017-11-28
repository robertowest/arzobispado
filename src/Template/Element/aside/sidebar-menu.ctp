<ul class="sidebar-menu">
    <li class="header">MENU GENERAL</li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-group"></i>
            <span>Usuarios</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li>
                <?= $this->html->link('<i class="fa fa-user"></i> Crear usuario',
                    ['controller' => 'usuarios', 'action' => 'register'], ['escape' => false]) ?>
            </li>
            <?php
            if ( isset($current_user) && isset($current_user['username']) )
            {
            ?>
            <li>
                <?= $this->html->link('<i class="fa fa-list"></i> Listado',
                    ['controller' => 'usuarios', 'action' => 'index'], ['escape' => false]) ?>
            </li>
            <?php
            }
            ?>
            <li>
            <?php
            if ( isset($current_user) && isset($current_user['username']) ) {
                echo $this->html->link('<i class="fa fa-sign-out"></i> Cerrar sesión',
                                       ['controller' => 'usuarios', 'action' => 'logout'], ['escape' => false]);
            } else {
                echo $this->html->link('<i class="fa fa-sign-in"></i> Iniciar sesión',
                                       ['controller' => 'usuarios', 'action' => 'login'], ['escape' => false]);
            }
            ?>
            </li>
        </ul>
    </li>

    <!-- sacerdotes -->
    <li class="treeview">
        <a href="#">
            <i class="fa fa-male"></i><span>Sacerdotes</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li>
                <?= $this->html->link('<i class="fa fa-list"></i> Fojas',
                    ['controller' => 'fojas'], ['escape' => false]) ?>
            </li>
            <li>
                <a href="#"><i class="fa fa-folder"></i> Maestros <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li>
                        <?= $this->html->link('<i class="fa fa-list"></i> Sacerdotes',
                            ['controller' => 'sacerdotes', 'action' => 'index'], ['escape' => false]) ?>
                    </li>
                    <li>
                        <?= $this->html->link('<i class="fa fa-list"></i> Funciones',
                            ['controller' => 'funciones'], ['escape' => false]) ?>
                    </li>
                    <li>
                        <?= $this->html->link('<i class="fa fa-list"></i> Instituciones',
                            ['controller' => 'instituciones'], ['escape' => false]) ?>
                    </li>
                    <!-- más niveles
                    <li>
                        <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                        </ul>
                    </li>
                    -->
                </ul>
            </li>
        </ul>
    </li>

    <!-- archivo protocolar -->
    <li class="treeview">
        <a href="#">
            <i class="fa fa-tags"></i><span>Protocolos</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li>
                <?= $this->html->link('<i class="fa fa-list"></i> Tipos',
                    ['controller' => 'protocoloTipo'], ['escape' => false]) ?>
            </li>
            <li>
                <?= $this->html->link('<i class="fa fa-list"></i> Protocolos',
                    ['controller' => 'protocolos'], ['escape' => false]) ?>
            </li>
            <li>
                <?= $this->html->link('<i class="fa fa-list"></i> Trámites',
                    ['controller' => 'protocolos', 'action' => 'index/tramites'], 
                    ['escape' => false]) ?>
            </li>
        </ul>
    </li>



    <!-- otros controladores -->
    <li class="treeview">
        <a href="#">
            <i class="fa fa-tags"></i><span>Otros</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li>
                <a href="#"><i class="fa fa-circle-o"></i> Protocolos <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li>
                        <?= $this->html->link('<i class="fa fa-list"></i> Campos',
                            ['controller' => 'protocoloCampos'], ['escape' => false]) ?>
                    </li>
                    <li>
                        <?= $this->html->link('<i class="fa fa-list"></i> Campo/Contenido',
                            ['controller' => 'protocoloCampoContenido'], ['escape' => false]) ?>
                    </li>
                </ul>
            </li>
        </ul>
    </li>    
</ul>