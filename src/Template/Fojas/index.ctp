<?php
// template para los input de filtro
$this->Form->setTemplates(['inputContainer' => '{{content}}',]);
$element = $this->name . '/table';
?>

<section class="content-header">
    <h1>
        <?= $titulo ?><small><?= $subtitulo ?></small>
        <div class="pull-right">
            <?= $this->Html->link('<i class="fa fa-plus"></i> Nuevo',
                        ['action' => 'add'],
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
<!-- formulario de búsqueda cuando no existe filtro por sacerdote -->
<?php if ( strpos($this->request->url, '/sacerdote/') == 0 ) { ?>
                    <div class="box-tools">
                        <?= $this->Form->create() ?>
                            <div class="input-group input-group-sm"  style="width: 180px;">
                                <?= $this->Form->input('search', ['label' => false,
                                                                  'div' => false,
                                                                  'class' => 'form-control',
                                                                  'placeholder' => 'texto de búsqueda']) ?>
                                <span class="input-group-btn">
                                <?= $this->Form->button('<i class="fa fa-filter"></i> Filtro', 
                                        ['label' => false,
                                         'escape' => false,
                                         'class' => 'btn btn-info btn-flat']) ?>
                                </span>
                            </div>
                        <?= $this->Form->end() ?>
                    </div>
<?php } ?>
                </div>

                <div class="box-body table-responsive no-padding">
                    <?php echo $this->element($element); ?>
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
