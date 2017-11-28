<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Página 2
        <small>pruebas de niveles (breadcrumb)</small>
    </h1>
    <ol class="breadcrumb">
        <?php $this->Breadcrumbs->add('Home', ['controller' => 'pages', 'action' => 'display']) ?>
        <?php $this->Breadcrumbs->add('Página 1', ['controller' => 'abc', 'action' => 'pagina1']) ?>
        <?php $this->Breadcrumbs->add('Página 2') ?>
        <?php echo $this->Breadcrumbs->render(['class' => 'breadcrumb']) ?>
    </ol>
</section>

<section class="content">
    <!-- contenido -->
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <?= $this->Html->link('Página 3', ['controller' => 'abc', 'action' => 'pagina3']) ?>
            </div>
        </div>
    </div>

</section>