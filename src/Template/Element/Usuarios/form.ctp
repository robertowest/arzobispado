<?= $this->Form->create($registro, array('role' => 'form',
                                         'class' => 'form-horizontal')) ?>
    <div class="box-body">
        <fieldset>
            <?php
            echo $this->Form->control('nombre', ['style'=>'width: 300px']);
            echo $this->Form->control('apellido', ['style'=>'width: 300px']);
            echo $this->Form->control('username', ['label'=>'Usuario', 'style'=>'width: 200px']);
            echo $this->Form->control('passwd', ['label'=>'Contraseña',
                                                 'type'=>'password',
                                                 'style'=>'width: 200px']);
            echo $this->Form->control('rol', ['options' => ['admin' => 'Admin',
                                                            'user' => 'Usuario'],
                                              'style'=>'width: 200px']);
            ?>
        </fieldset>
    </div>

    <div class="box-footer">
        <?= $this->Form->button('Grabar', ['class' => 'btn pull-right']) ?>
    </div>
<?= $this->Form->end() ?>
