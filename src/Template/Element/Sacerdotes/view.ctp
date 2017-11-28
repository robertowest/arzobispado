<div class="box-body">
    <dl class="dl-horizontal">
        <dt>Apellido</dt>
        <dd><?= h($registro->apellido) ?></dd>

        <dt>Nombre</dt>
        <dd><?= h($registro->nombre) ?></dd>

        <dt>DNI</dt>
        <dd><?= h($registro->dni) ?></dd>

        <dt>Fecha Nacimeinto</dt>
        <dd><?= $this->Time->format($registro->fnacimiento, 'd/MM/Y') ?></dd>

        <dt>Fecha Ordenación</dt>
        <dd><?= $this->Time->format($registro->fordenacion, 'd/MM/Y') ?></dd>

        <dt>Protocolo</dt>
        <dd><?= h($registro->protocolo) ?></dd>
    </dl>
</div>
