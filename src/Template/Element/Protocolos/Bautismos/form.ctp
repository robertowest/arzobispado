<?php
    $templates_horizontal_two_columns = [
        'label' => '<label class="control-label col-md-2"{{attrs}}>{{text}}</label>',
        'formGroup' => '{{label}}<div class="col-md-4">{{input}}{{error}}{{help}}</div>',
        'dateWidget' => '<span class="form-inline">{{day}} {{month}} {{year}}</span>',
        'checkboxFormGroup' => '<div class="checkbox">{{label}}</div>{{error}}{{help}}',
        'inputContainer' => '{{content}}',
        'inputContainerError' => '{{content}}',
    ];

    $without_templates = [
        'label' => '',
        'formGroup' => '{{input}}{{error}}{{help}}',
        'dateWidget' => '<span class="form-inline">{{day}} {{month}} {{year}}</span>',
        'inputContainer' => '{{content}}',
        'inputContainerError' => '{{content}}',
    ];
?>

<!-- bloque necesario para la máscara de entrada -->
<?php
$this->Html->script(['plugins/input-mask/jquery.inputmask',
                     'plugins/input-mask/jquery.inputmask.date.extensions'],
                    ['block' => 'script']);
?>
<?php $this->start('scriptBotton'); ?>
<script>
  $(function () {
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    $("[data-mask]").inputmask();
  });
</script>
<?php $this->end(); ?>
<!-- fin del bloque necesario para la máscara de entrada -->

<?= $this->Form->create($registro, array('role' => 'form', 'type' => 'file',
                                         'class' => 'form-horizontal')) ?>
    <div class="box-body">
        <fieldset>
            <?php $this->Form->setTemplates($without_templates) ?>

            <?= $this->Form->hidden('protocolo_id') ?>

            <div class="form-group text">
                <div class="col-md-1">&nbsp;</div>

                <label class="control-label col-md-2">Parroquia</label>
                <div class="col-md-4">
                    <?= $this->Form->control('parroquia_id', ['options' => $parroquias]) ?>
                </div>
            </div>

            <hr>

            <div class="form-group text">
                <div class="col-md-1"><b>Interesado</b></div>

                <label class="control-label col-md-2">Nombre</label>
                <div class="col-md-4">
                    <?= $this->Form->control('interesado_nombre') ?>
                </div>

                <label class="control-label col-md-1">DNI</label>
                <div class="col-md-2">
                    <?= $this->Form->control('interesado_dni',
                        ['maxlength'=>'11', 'data-inputmask'=>"'mask': '99.999.999'", 'data-mask']) ?>
                </div>
            </div>

            <div class="form-group text">
                <div class="col-md-1">&nbsp;</div>

                <label class="control-label col-md-2">F. Nacimiento</label>
                <div class="col-md-5">
                    <?= $this->Form->control('interesado_fnacimiento', 
                        ['empty' => true,
                         'type' => 'date',
                         'minYear' => date('Y') - 99,
                         'maxYear' => date('Y'),
                         'hour' => false, 'minute' => false, 'second' => false, 'meridian' => false,
                         'orderYear' => 'desc']) ?>
                    <!-- ['type'=>'text', 'data-inputmask'=>"'alias': 'dd/mm/yyyy'", 'data-mask'] -->
                </div>                
            </div>

            <hr>

            <div class="form-group text">
                <div class="col-md-1"><b>Padre</b></div>

                <label class="control-label col-md-2">Nombre</label>
                <div class="col-md-4">
                    <?= $this->Form->control('padre_nombre') ?>
                </div>

                <label class="control-label col-md-1">DNI</label>
                <div class="col-md-2">
                    <?= $this->Form->control('padre_dni',
                        ['maxlength'=>'11', 'data-inputmask'=>"'mask': '99.999.999'", 'data-mask']) ?>
                </div>
            </div>

            <hr>

            <div class="form-group text">
                <div class="col-md-1"><b>Madre</b></div>

                <label class="control-label col-md-2">Nombre</label>
                <div class="col-md-4">
                    <?= $this->Form->control('madre_nombre') ?>
                </div>

                <label class="control-label col-md-1">DNI</label>
                <div class="col-md-2">
                    <?= $this->Form->control('madre_dni',
                        ['maxlength'=>'11', 'data-inputmask'=>"'mask': '99.999.999'", 'data-mask']) ?>
                </div>
            </div>

        </fieldset>
    </div>

    <div class="box-footer">
        <?= $this->Form->button('Grabar', ['class' => 'btn pull-right']) ?>
    </div>
<?= $this->Form->end() ?>
