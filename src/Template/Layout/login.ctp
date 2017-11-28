<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>
            <?= isset($theme['title']) ? $theme['title'] : $this->fetch('title') ?>
        </title>
        <?= $this->Html->meta('icon') ?>

        <?= $this->Html->css('bootstrap.min.css') ?>
        <?= $this->Html->css('font-awesome.min.css') ?>
        <?= $this->Html->css('ionicons.min.css') ?>
        <?= $this->Html->css('AdminLTE.min.css') ?>
        <?= $this->Html->css('skins/skin-blue') ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
        <?= $this->fetch('scriptBotton') ?>
    </head>
    <body class="hold-transition login-page">
        <div class="row">
            <div class="col-xs-3"></div>
            <div class="col-xs-6">
                <p> <?= $this->Flash->render(); ?> </p>
                <p> <?= $this->Flash->render('auth'); ?> </p>
            </div>
        </div>

        <div class="login-box">
            <div class="login-box-body">
                <?php echo $this->fetch('content'); ?>
            </div>

        </div>
    </body>
</html>
