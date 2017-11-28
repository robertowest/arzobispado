<?php
    use Cake\Utility\Inflector;

    if ($this->name = 'Tramites')
        $element = 'Protocolos/form';
    else
        $element = $this->name . '/form';
?>

<section class="content-header">
    <h1>
        <?= Inflector::singularize($this->name) ?>
        <small><?= $subtitulo ?></small>
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

                <?= $this->element($element) ?>
            </div>
        </div>
    </div>
</section>