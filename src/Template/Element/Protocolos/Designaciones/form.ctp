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

<?= $this->Form->create($registro, array('role' => 'form', 'type' => 'file',
                                         'class' => 'form-horizontal')) ?>
    <div class="box-body">
        <fieldset>
            <?php $this->Form->setTemplates($without_templates) ?>

            <?= $this->Form->hidden('protocolo_id') ?>

            <div class="form-group text">
                <label class="control-label col-md-2">Sacerdote</label>
                <div class="col-md-4">
                    <?= $this->Form->control('sacerdote_id', ['options' => $sacerdotes]) ?>
                </div>

                <label class="control-label col-md-2">Fecha de Alta</label>
                <div class="col-md-4">
                    <?= $this->Form->control('falta', ['empty' => true,
                                                       'type' => 'date',
                                                       'minYear' => date('Y') - 80,
                                                       'maxYear' => date('Y'),
                                                       'hour' => false, 'minute' => false, 'second' => false, 'meridian' => false,
                                                       'orderYear' => 'desc']) ?>
                </div>
            </div>

            <div class="form-group text">
                <label class="control-label col-md-2">Función</label>
                <div class="col-md-4">
                    <?= $this->Form->control('funcion_id', ['options' => $funciones]) ?>
                </div>

                <label class="control-label col-md-2">Fecha de Baja</label>
                <div class="col-md-4">
                    <?= $this->Form->control('fbaja', ['empty' => true,
                                                       'type' => 'date',
                                                       'minYear' => date('Y') - 80,
                                                       'maxYear' => date('Y'),
                                                       ]) ?>
                </div>
            </div>

            <div class="form-group text">
                <label class="control-label col-md-2">Institución</label>
                <div class="col-md-4">
                    <?= $this->Form->control('institucion_id', ['options' => $instituciones]) ?>
                </div>

                <label class="control-label col-md-2">Orden</label>
                <div class="col-md-1">
                    <?= $this->Form->control('orden') ?>
                </div>
            </div>

            <div class="form-group text">
                <label class="control-label col-md-2">Observaciones</label>
                <div class="col-md-9">
                    <?= $this->Form->control('comentario') ?>
                </div>
            </div>

            <!--
            <div class="form-group text">
                <label class="control-label col-md-2">Archivo protocolar</label>
                <div class="col-md-4">
                    <?= $this->Form->control('name', ['autofocus' => 'true',
                                                      'label' => 'Descripción',
                                                      'value' => $registro->name,
                                                      'placeholder' => 'descripción del archivo']) ?>
                </div>
                <div class="col-md-1">
                    <?= $this->Form->control('file', ['label' => 'Archivo', 'type'=>'file']) ?>
                </div>
            </div>
            -->
            
        </fieldset>
    </div>

    <div class="box-footer">
        <?= $this->Form->button('Grabar', ['class' => 'btn pull-right']) ?>
    </div>
<?= $this->Form->end() ?>
