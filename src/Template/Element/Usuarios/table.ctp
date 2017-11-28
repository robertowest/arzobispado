<table class="table table-hover">
  <tr>
    <th>Id</th>
    <th><?= $this->Paginator->sort('nombre') ?></th>
    <th>Usuario</th>
    <th><?= $this->Paginator->sort('rol') ?></th>
    <th>Acciones</th>
  </tr>
  <?php foreach ($registros as $registro): ?>
    <tr>
      <td><?= $this->Number->format($registro->id) ?></td>
      <td><?= h($registro->nombre_completo) ?></td>
      <td><?= h($registro->username) ?></td>
      <td><?= h($registro->rol) ?></td>
      <td class="actions actions-btn3" style="white-space:nowrap">
        <?= $this->Html->link('<i class="fa fa-pencil fa-lg"></i>', ['action' => 'edit', $registro->id],
                                  ['class'=>'btn btn-sm btn-primary', 'escape' => false]) ?>
        <?= $this->Form->postLink('<i class="fa fa-trash-o fa-lg"></i>', ['action' => 'delete', $registro->id],
                                      ['confirm' => '¿Desea borrar el registro?',
                                       'class'=>'btn btn-sm btn-danger', 'escape' => false]) ?>
        <?= $this->Html->link('<i class="fa fa-eye fa-lg"></i>', ['action' => 'view', $registro->id],
                                  ['class'=>'btn btn-sm btn-default', 'escape' => false]) ?>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
