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
            echo $this->Form->control('descripcion', ['label' => 'Descripción', 'style'=>'width: 300px']);
            ?>
        </fieldset>
    </div>

    <div class="box-footer">
        <?= $this->Form->button('Grabar', ['class' => 'btn pull-right']) ?>
    </div>
<?= $this->Form->end() ?>
