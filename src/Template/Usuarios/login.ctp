<?php
$this->layout = 'login';
$this->Form->setTemplates(['inputContainer' => '{{content}}',]);
?>

<p class="login-box-msg">Ingrese los datos para iniciar sesión</p>

<?= $this->Form->create() ?>

<div class="form-group has-feedback">
    <?= $this->Form->control('username', ['class' => 'form-control',
                                          'placeholder' => 'Usuario / eMail',
                                          'label' => false]) ?>
    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
</div>

<div class="form-group has-feedback">
    <?= $this->Form->control('passwd', ['class' => 'form-control',
                                        'placeholder' => 'Contraseña',
                                        'label' => false]) ?>
    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>

<div class="row">
    <div class="col-xs-8"></div>
    <div class="col-xs-4">
        <?= $this->Form->button('Ingresar', ['class' => 'btn btn-primary btn-block btn-flat']); ?>
    </div>
</div>

<?= $this->Form->end() ?>