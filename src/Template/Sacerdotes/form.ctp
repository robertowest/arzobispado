<section class="content-header">
    <h1>
        Sacerdote
        <small>
            <?php
            if ($this->request->getParam('action') === 'add')
            { echo 'nuevo registro'; }
            else
            { echo 'modificar registro'; }
            ?>
        </small>
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

                <?= $this->element('Sacerdotes/form') ?>
            </div>
        </div>
    </div>
</section>


<?php
$this->Html->script(['plugins/input-mask/jquery.inputmask',
                     'plugins/input-mask/jquery.inputmask.date.extensions',
                     'plugins/input-mask/jquery.inputmask.extensions'],
                    ['block' => 'script']);
$this->start('scriptBotton');
?>

<script>
  $(function ()
  {
    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();
  });
</script>

<?php $this->end(); ?>
