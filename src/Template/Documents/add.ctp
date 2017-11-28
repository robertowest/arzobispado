<section class="content-header">
    <h1>
        Archivo
        <small>nuevo archivo asociado</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <?= $this->Html->link('<i class="fa fa-arrow-left"></i> '.'atrás', 
                isset($urlReferer) ? $urlReferer : ['action' => 'index'], 
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
                            //hidden
                            echo $this->Form->hidden('controller', ['type' => 'text', 'value' => $registro->controller]);
                            echo $this->Form->hidden('controller_id', ['type' => 'text', 'value' => $registro->controller_id]);
                            echo $this->Form->hidden('user_id', ['type' => 'text', 'value' => $registro->user_id]);

                            echo $this->Form->control('name', ['autofocus' => 'true',
                                                               'label' => 'Descripción',
                                                               'value' => $registro->name,
                                                               'style'=>'width: 250px',
                                                               'placeholder' => 'descripción del archivo']);
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