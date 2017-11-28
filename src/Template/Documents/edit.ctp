<section class="content-header">
    <h1>
        Archivo
        <small>modificamos el archivo asociado</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <?= $this->Html->link('<i class="fa fa-arrow-left"></i> '.'atrás', 
                (isset($urlReferer) ? $urlReferer : ['action' => 'index']),         
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

                <!-- formulario -->
                <?= $this->Form->create($registro, array('role' => 'form', 'type' => 'file',
                                                         'class' => 'form-horizontal')) ?>
                    <div class="box-body">
                        <fieldset>
                            <?php
                            echo $this->Form->control('controller', ['type' => 'hidden', 'value' => $registro->controller]);
                            echo $this->Form->control('controller_id', ['type' => 'hidden', 'value' => $registro->controller_id]);
                            echo $this->Form->control('user_id', ['type' => 'hidden', 'value' => $registro->user_id]);

                            echo $this->Form->control('name', ['autofocus' => 'true',
                                                               'label' => 'Etiqueta',
                                                               'value' => $registro->name,
                                                               'style'=>'width: 250px',
                                                               'placeholder' => 'nombre del protocolo']);
                            echo $this->Form->control('filename', ['label' => 'Nombre', 'readonly'=>True]);
                            echo $this->Form->control('filepath', ['label' => 'Directorio', 'readonly'=>True]);
                            echo $this->Form->control('file', ['label' => 'Archivo', 'type'=>'file']);
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