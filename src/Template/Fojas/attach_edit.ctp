<section class="content-header">
    <h1>
      Modificación del archivo adjuntar
      <small>(id: <?= h($registro->id) ?>)</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <?= $this->Html->link('<i class="fa fa-arrow-left"></i> '.'atrás', ['action' => 'index'],
                                                                               ['escape' => false]) ?>
        </li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Formulario</h3>
                </div>

                <?= $this->Form->create($registro, array('role' => 'form',
                                                         'class' => 'form-horizontal')) ?>
                    <div class="box-body">
                        <fieldset>
                            <?php
                            // almacenamos el valor de redirect para poder retornarlo al controlador
                            echo $this->Form->hidden('redirect', ['value' => $redirect]);

                            echo $this->Form->control('protocolo', ['readonly' => True,
                                                                    'style'=>'width: 80px']);

                            echo $this->Form->control('sacerdote', ['readonly' => True,
                                                                    'value' => $registro->sacerdote->nombreCompleto,
                                                                    'style'=>'width: 400px']);

                            echo $this->Form->control('función', ['readonly' => True,
                                                                  'value' => $registro->funcion->descripcion,
                                                                  'style'=>'width: 400px']);

                            echo $this->Form->control('institución', ['readonly' => True,
                                                                      'value' => $registro->institucion->descripcion,
                                                                      'style'=>'width: 400px']);

                            echo $this->Form->control('file_dir', ['label' => 'Directorio',
                                                                   'style'=>'width: 200px']);

                            echo $this->Form->control('file_name', ['label' => 'Archivo',
                                                                    'style'=>'width: 400px']);
                            ?>
                        </fieldset>
                    </div>

                    <div class="box-footer">
                        <?= $this->Form->button('Grabar', ['class' => 'btn pull-right']) ?>
                    </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</section>
