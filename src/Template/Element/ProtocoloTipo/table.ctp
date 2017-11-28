<table id="example4" class="table table-hover">
  <thead>
    <tr>
      <th>Nro.</th>
      <th>Descripción</th>
      <th>Padre</th>
      <th>Raíz</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($registros as $registro): ?>
    <tr>
      <td><?= $this->Number->format($registro->id) ?></td>
      <td><?= h($registro->name) ?></td>
      <td><?= $registro->has('parent_protocolo_tipo') ? $registro->parent_protocolo_tipo->path : '' ?></td>
      <td><?= $registro->firstLevel ?></td>
      <?php //echo $registro->has('parent_protocolo_tipo') ? $this->Html->link($registro->parent_protocolo_tipo->name, ['controller' => 'ProtocoloTipo', 'action' => 'view', $registro->parent_protocolo_tipo->id]) : ''; ?>

      <td class="actions actions-btn1" style="white-space:nowrap">
        <?= $this->Html->link('<i class="fa fa-pencil fa-lg"></i>',
                              ['action' => 'edit', $registro->id],
                              ['class'=>'btn-default', 'escape' => false]) ?>

        <?= $this->Form->postLink('<i class="fa fa-trash-o fa-lg"></i>',
                                  ['action' => 'delete', $registro->id],
                                  ['confirm' => '¿Desea borrar el registro?',
                                   'class'=>'btn-default', 'escape' => false]) ?>

        <?= $this->Html->link('<i class="fa fa-eye fa-lg"></i>',
                              ['action' => 'view', $registro->id],
                              ['class'=>'btn-default', 'escape' => false]) ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
