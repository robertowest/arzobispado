<?php
$cakeDescription = 'Mi CakePHP : '.$this->fetch('title');
?>
<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>
            <?php echo isset($theme['title']) ? $theme['title'] : $cakeDescription; ?>
        </title>
        <?= $this->Html->meta('icon') ?>

        <?= $this->Html->css('bootstrap.min.css') ?>
        <?= $this->Html->css('font-awesome.min.css') ?>
        <?= $this->Html->css('ionicons.min.css') ?>
        <?= $this->Html->css('AdminLTE.min.css') ?>
        <?= $this->Html->css('skins/skin-blue') ?>
        <?= $this->Html->css('estilos.css') ?>

        <?= $this->Html->script('jquery.min.js') ?>
        <?= $this->Html->script('bootstrap.min.js') ?>
        <?= $this->Html->script('plugins/slimScroll/jquery.slimscroll.min.js') ?>
        <?= $this->Html->script('plugins/fastclick/fastclick.min.js') ?>
        <?= $this->Html->script('AdminLTE.min.js') ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
        <?= $this->fetch('scriptBotton') ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="<?php echo $this->Url->build('/'); ?>" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><?php echo $theme['logo']['mini'] ?></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><?php echo $theme['logo']['large'] ?></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <?php echo $this->element('nav-top') ?>
            </header>

            <!-- Left side column. contains the sidebar -->
            <?php echo $this->element('aside-main-sidebar'); ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <?php echo $this->Flash->render(); ?>
                <?php echo $this->Flash->render('auth'); ?>
                <?php echo $this->fetch('content'); ?>
            </div>
            <!-- /.content-wrapper -->

            <?php echo $this->element('footer'); ?>

            <!-- Control Sidebar -->
            <?php echo $this->element('aside-control-sidebar'); ?>
            <!-- /.control-sidebar -->

            <!-- Add the sidebar's background. This div must be placed
            immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>

        </div>
        <!-- ./wrapper -->

    </body>
</html>
