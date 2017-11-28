<?php
  use Cake\Utility\Inflector;

  if ($this->name = 'Tramites')
    $element = 'Protocolos/view';
  else
    $element = $this->name . '/view'
?>

<section class="content-header">
  <h1>
    <?= Inflector::singularize($this->name) ?>
    <small><?= $subtitulo ?></small>
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
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-info"></i>
                    <h3 class="box-title">Información</h3>
                </div>

                <?= $this->element($element) ?>
            </div>
        </div>
    </div>
</section>
