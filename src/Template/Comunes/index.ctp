<?php
  // template para los input de filtro
  $this->Form->setTemplates(['inputContainer' => '{{content}}',]);

  if ($titulo == 'Trámites')
    $controlador = 'Tramites';
  else
    $controlador = 'Protocolos';
?>

<section class="content-header">
  <h1>
    <?= $titulo ?><small><?= $subtitulo ?></small>
    <div class="pull-right">
      <?= $this->Html->link('<i class="fa fa-plus"></i> Nuevo',
            ['controller' => $controlador, 'action' => 'add'],
            ['escape' => false, 'class'=>'btn btn-success btn-xs']) ?>
    </div>
  </h1>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?= $mensaje ?></h3>
          <div class="box-tools">
            <?= $this->Form->create() ?>
              <div class="input-group input-group-sm"  style="width: 180px;">
                <?= $this->Form->input('search', ['label' => false,
                                                  'div' => false,
                                                  'class' => 'form-control',
                                                  'placeholder' => 'texto a buscar']) ?>
                <span class="input-group-btn">
                <?= $this->Form->button('<i class="fa fa-filter"></i> Filtro', ['label' => false,
                                                                                'escape' => false,
                                                                                'class' => 'btn btn-info btn-flat']) ?>
                </span>
              </div>
            <?= $this->Form->end() ?>
          </div>
        </div>

        <div class="box-body table-responsive no-padding">
          <?php echo $this->element('Protocolos/table'); ?>
        </div>

        <div class="box-footer clearfix">
          <ul class="pagination pagination-sm no-margin pull-right">
            <?php echo $this->Paginator->numbers(); ?>
          </ul>
        </div>
      </div>

    </div>
  </div>
</section>
