<div class="box-body">
    <dl class="dl-horizontal">
        <dt>Nro.</dt>
        <dd><?= h($registro->id) ?></dd>

        <dt>Descripción</dt>
        <dd><?= h($registro->name) ?></dd>

        <dt>Padre</dt>
        <dd><?= $registro->has('parent_protocolo_tipo') ? 
                    $registro->parent_protocolo_tipo->name : '' ?></dd>
    </dl>

    <hr>

    <div class="related">
        <h4>Tipo de protocolo relacionado</h4>
        <?php if (!empty($registro->child_protocolo_tipo)): ?>
        <table id="example4" class="table table-hover">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Descripción</th>
                <th scope="col">Activo</th>
                <th scope="col" class="actions">Acciones</th>
            </tr>
            <?php foreach ($registro->child_protocolo_tipo as $childProtocoloTipo): ?>
            <tr>
                <td><?= h($childProtocoloTipo->id) ?></td>
                <td><?= h($childProtocoloTipo->name) ?></td>
                <td><?= h($childProtocoloTipo->active) ?></td>

                <td class="actions actions-btn3" style="white-space:nowrap">
                    <?= $this->Html->link('<i class="fa fa-eye fa-lg"></i>',
                                          ['action' => 'view', $childProtocoloTipo->id],
                                          ['class'=>'btn btn-sm btn-default', 'escape' => false]) ?>
                    <?= $this->Html->link('<i class="fa fa-pencil fa-lg"></i>',
                                          ['action' => 'edit', $childProtocoloTipo->id],
                                          ['class'=>'btn btn-sm btn-primary', 'escape' => false]) ?>
                    <?= $this->Form->postLink('<i class="fa fa-trash-o fa-lg"></i>',
                                              ['action' => 'delete', $childProtocoloTipo->id],
                                              ['confirm' => '¿Desea borrar el registro?',
                                               'class'=>'btn btn-sm btn-danger', 'escape' => false]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
