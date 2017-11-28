<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Página 1
        <small>pruebas de niveles (breadcrumb)</small>
    </h1>
    <ol class="breadcrumb">
        <?php $this->Breadcrumbs->add('Home', ['controller' => 'pages', 'action' => 'display']) ?>
        <?php $this->Breadcrumbs->add('Página 1') ?>
        <?php echo $this->Breadcrumbs->render(['class' => 'breadcrumb']) ?>
    </ol>
</section>

<section class="content">
    <!-- contenido -->
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <?= $this->Html->link('Página 2', ['controller' => 'abc', 'action' => 'pagina2']) ?>
            </div>
        </div>
    </div>

</section>
