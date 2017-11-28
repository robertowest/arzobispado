<?php
    use Cake\Utility\Inflector;
    $element = $this->name . '/form'
?>

<section class="content-header">
    <h1>
        <?= $titulo ?>
        <small><?= $subtitulo ?></small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <?= $this->Html->link('<i class="fa fa-arrow-left"></i> '.'atrás', 
                isset($urlReferer) ? $urlReferer : ['action' => 'index'], ['escape' => false]) ?>            
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

                <?= $this->element('Protocolos/Designaciones/form') ?>
            </div>
        </div>
    </div>
</section>
