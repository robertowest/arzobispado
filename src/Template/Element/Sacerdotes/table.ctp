<table class="table table-hover">
  <thead>
    <tr>
      <th><?= $this->Paginator->sort('id') ?></th>
      <th><?= $this->Paginator->sort('nombre_completo', 'Nombre') ?></th>
      <th>DNI</th>
      <th>Nacimiento</th>
      <th>Ordenación</th>
      <th><?= $this->Paginator->sort('protocolo') ?></th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($registros as $registro): ?>
    <tr>
      <td><?= $this->Number->format($registro->id) ?></td>
      <td><?= h($registro->nombre_completo) ?></td>
      <td><?= h($registro->dni) ?></td>
      <td><?= $this->Time->format($registro->fnacimiento, 'dd/MM/Y') ?></td>
      <td><?= $this->Time->format($registro->fordenacion, 'dd/MM/Y') ?></td>
      <td><?= h($registro->protocolo) ?></td>
      <td class="actions actions-btn3" style="white-space:nowrap">
        <?= $this->Html->link('<i class="fa fa-pencil fa-lg"></i>',
                              ['action' => 'edit', $registro->id],
                              ['class'=>'btn btn-sm btn-primary', 'escape' => false]) ?>

        <?= $this->Form->postLink('<i class="fa fa-trash-o fa-lg"></i>',
                                  ['action' => 'delete', $registro->id],
                                  ['confirm' => '¿Desea borrar el registro?',
                                   'class'=>'btn btn-sm btn-danger', 'escape' => false]) ?>

        <?= $this->Html->link('<i class="fa fa-eye fa-lg"></i>',
                              ['action' => 'view', $registro->id],
                              ['class'=>'btn btn-sm btn-default', 'escape' => false]) ?>

        <?= $this->Html->link('Fojas', ['controller' => 'Fojas',
                                        'action' => 'sacerdote', $registro->id],
                                       ['class' => 'btn btn-sm btn-default']) ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
