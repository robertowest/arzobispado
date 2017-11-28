<?php
  $this->layout = 'register';
  $myTemplates = ['inputContainer' => '{{content}}',];
  $this->Form->setTemplates($myTemplates);
?>

<?= $this->Form->create($registro, array('role' => 'form')) ?>
  <div class="form-group has-feedback">
    <?= $this->Form->control('nombre', ['class' => 'form-control',
                                        'placeholder' => 'Nombre',
                                        'label' => false]) ?>
    <span class="glyphicon glyphicon-user form-control-feedback"></span>
  </div>
  <div class="form-group has-feedback">
    <?= $this->Form->control('apellido', ['class' => 'form-control',
                                          'placeholder' => 'Apellido',
                                          'label' => false]) ?>
    <span class="glyphicon glyphicon-user form-control-feedback"></span>
  </div>
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
    <div class="col-xs-6">
    </div>
    <div class="col-xs-6">
      <button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
    </div>
  </div>

<?php echo $this->Form->end(); ?>