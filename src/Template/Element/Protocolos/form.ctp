<?php
$opciones = ['bautis' => 'Bautismos',
             'rectif' => 'Rectificaciones',
             'bau_rect' => 'Bautismo - Rectificación',
             'bau_repo' => 'Bautismo - Reposición',
            ];

echo $this->Form->create($registro, array('role' => 'form', 'type' => 'file',
                                          'class' => 'form-horizontal'))
?>
    <div class="box-body">
        <fieldset>
            <?php
            echo $this->Form->control('año', ['style'=>'width: 100px', 'placeholder'=>date('Y')]);
            echo $this->Form->control('protocolo', ['style'=>'width: 100px']);
            echo $this->Form->control('protocolo_tipo_id', ['options' => $protocoloTipo, 
                                                            'empty' => true, 
                                                            'style'=>'width: 400px']);
            //echo $this->Form->control('protocolo_tipo_id', ['options' => $protocoloTipo]);
            //echo $this->Form->control('tipo', ['options' => $opciones, 'style'=>'width: 300px']);
            ?>
        </fieldset>
    </div>

    <div class="box-footer">
        <?= $this->Form->button('Grabar', ['class' => 'btn pull-right']) ?>
    </div>
<?= $this->Form->end() ?>
