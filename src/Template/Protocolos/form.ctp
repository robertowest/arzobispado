<?php
if ($titulo == 'Trámite')
    $controlador = 'Tramites';
else
    $controlador = 'Protocolos';
?>

<section class="content-header">
    <h1>
        <?= $titulo ?>
        <small><?= $subtitulo ?></small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <?= $this->Html->link('<i class="fa fa-arrow-left"></i> '.'atrás', 
                ['controller' => $controlador, 'action' => 'index'], ['escape' => false]) ?>
        </li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Formulario</h3>
                </div>

                <?= $this->element('Protocolos/form') ?>
            </div>
        </div>

        <div class="col-md-3">
            <div class="box box-primary">
                <!--
                <div class="box-header with-border">
                <h3 class="box-title">Numeración protocolo <?= date('Y') ?></h3>
                </div>
                -->
                <?= $this->element('Protocolos/contador'); ?>
            </div>
        </div>
    </div>
</section>
