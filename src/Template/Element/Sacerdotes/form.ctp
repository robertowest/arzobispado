<?php
//$date_template = ['dateWidget' => '<ul class="list-inline"><li class="day">{{day}}</li><li class="month">{{month}}</li><li class="year">{{year}}</li><li class="hour">{{hour}}</li><li class="minute">{{minute}}</li><li class="second">{{second}}</li><li class="meridian">{{meridian}}</li></ul>',];

$plantilla_fecha =
[
  'formGroup' => '{{label}}<div class="col-md-10">{{input}}{{error}}{{help}}</div>',
  'label' => '<label class="control-label col-md-2"{{attrs}}>{{text}}</label>',
  'input' => '<div class="input-group col-md-3"><input type="text" name="{{name}}" value="{{value}}" data-inputmask="&#039;alias&#039;: &#039;dd/mm/yyyy&#039;" data-mask class="form-control" /><div class="input-group-addon"><i class="fa fa-calendar"></i></div></div>',
];
?>

<?= $this->Form->create($registro, array('role' => 'form',
                                          'class' => 'form-horizontal')) ?>
    <div class="box-body">
        <fieldset>
            <?php
            echo $this->Form->control('apellido', ['style'=>'width: 300px']);
            echo $this->Form->control('nombre', ['style'=>'width: 300px']);
            echo $this->Form->control('dni', ['label' => 'DNI', 'style'=>'width: 100px']);
            echo $this->Form->control('fnacimiento', ['empty' => true,
                                                      'label' => 'Fecha Nacimiento',
                                                      'type' => 'date',
                                                      //'templates' => $date_template,
                                                      //'dateFormat' => 'DMY',
                                                      'minYear' => date('Y') - 80,
                                                      'maxYear' => date('Y') - 18,
                                                      //'monthNames' => false,
                                                     ]);
            echo $this->Form->control('fordenacion', ['empty' => true,
                                                      'label' => 'Fecha Ordenación',
                                                      'type' => 'date',
                                                      //'templates' => $date_template,
                                                      //'dateFormat' => 'DMY',
                                                      'minYear' => date('Y') - 80,
                                                      'maxYear' => date('Y'),
                                                      //'monthNames' => false,
                                                     ]);
            /*
            echo $this->Form->control('fnacimiento', ['templates' => $plantilla_fecha,
                                                      'label' => 'Fecha Nacimiento',
                                                      'type' => 'text']);
            echo $this->Form->control('fordenacion', ['templates' => $plantilla_fecha,
                                                      'label' => 'Fecha Ordenación',
                                                      'type' => 'text']);
            */
            echo $this->Form->control('protocolo', ['style'=>'width: 80px']);
            ?>

        </fieldset>
    </div>

    <div class="box-footer">
    <?= $this->Form->button('Grabar', ['class' => 'btn pull-right']) ?>
    </div>
<?= $this->Form->end() ?>
