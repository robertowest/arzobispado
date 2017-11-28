<?php

$checkboxTemplate = [

    'label' => '<label{{attrs}}>{{text}}</label>',    
    'nestingLabel' => '{{hidden}}<label{{attrs}}>{{input}}{{text}}</label>',

    'checkbox' => '<input type="checkbox" name="{{name}}" value="{{value}}"{{attrs}}/>',
    'checkboxFormGroup' => '{{label}}<div class="col-md-10">{{checkbox}}{{error}}{{help}}</div>',
    'checkboxWrapper' => '<div class="checkbox">{{label}}</div>',    
];

?>

<!--

    <div class="form-group text required">
        <label class="control-label col-md-2" for="tipo">Tipo</label>
        <div class="col-md-10">
            <input type="text" name="tipo" style="width: 300px" required="required" maxlength="10" id="tipo" class="form-control" />
        </div>
    </div>

    <div class="form-group checkbox">
        <input type="hidden" name="active" value="0" />
        <label for="active">
            <input type="checkbox" name="active" value="Y" id="active">Activo?</label>
    </div>

    <div class="form-group checkbox">
        <label class="control-label col-md-2" for="activo">Activo</label>
        <div class="col-md-10">
            <input type="hidden" name="activo" value="0" />
            <input type="checkbox" name="activo" id="activo" value="Y" />
        </div>
    </div>

-->

<?php
    echo $this->Form->create($registro, array('role' => 'form',
                                              'class' => 'form-horizontal'));

    /*
    $this->Form->setTemplates([
        'checkbox' => '<div class="{{checkboxstyle}}">'.
            '<input type="checkbox" name="{{name}}" id="{{name}}" value="{{value}}"{{attrs}}>'.
            '<label for="{{name}}"><span class="{{bold}}">{{text}}{{icon}}</span></label>'.
            '{{error}}'.
            '</div>'
    ]);
    */

    $checkboxTemplate = [

        'label' => '<label{{attrs}}>{{text}}</label>',    
        'nestingLabel' => '{{hidden}}<label{{attrs}}>{{input}}{{text}}</label>',

        'checkbox' => '<input type="checkbox" name="{{name}}" value="{{value}}"{{attrs}}/>',
        'checkboxFormGroup' => '{{label}}<div class="col-md-2">{{checkbox}}{{error}}{{help}}</div>',
        'checkboxWrapper' => '<div class="checkbox">{{label}}</div>',    
    ];

?>
    <div class="box-body">
        <fieldset>
            <?php
            echo $this->Form->control('protocolo_tipo_id', ['options' => $protocoloTipo,
                                                            'empty' => true,
                                                            'style'=>'width: 400px']);

            echo $this->Form->control('campo', ['style'=>'width: 300px']);
            
            echo $this->Form->control('tipo', ['options' => ['Texto', 'Número', 'Fecha'],
                                               'label'=>'Contenido', 'empty' => true,
                                               'style'=>'width: 300px']);

            if ($this->request['action'] == 'edit')
            {
                echo $this->Form->control('active', ['label'=>'Activo?', 
                                                     'type'=>'checkbox',
                                                     'value' => '1', 'default' => '1',
                                                     'hiddenField' => '0',
                                                     'templates' => $checkboxTemplate]);                
            }
            ?>

            <!-- debería ser así
            <div class="form-group checkbox">
                <label class="control-label col-md-2" for="activo">Activo</label>
                <div class="col-md-10">
                    <input type="hidden" name="activo" value="0" />
                    <input type="checkbox" name="activo" id="activo" value="Y" />
                </div>
            </div>            
            -->

        </fieldset>
    </div>

    <div class="box-footer">
        <?= $this->Form->button('Grabar', ['class' => 'btn pull-right']) ?>
    </div>
<?= $this->Form->end() ?>
