<table id="example4" class="table table-hover">
  <thead>
    <tr>
      <th><?= $this->Paginator->sort('sacerdote') ?></th>
      <th><?= $this->Paginator->sort('funcion', 'Función') ?></th>
      <th><?= $this->Paginator->sort('institucion', 'Institución') ?></th>
      <th>Fec. Alta</th>
      <th><?= $this->Paginator->sort('protocolo') ?></th>
      <th>Fec. Baja</th>
      <th>Ord</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($registros as $registro): ?>
    <tr>
      <td>
        <?= $registro->has('sacerdote') ?
            $this->Html->link($registro->sacerdote->nombreCompleto,
                ['controller' => 'Sacerdotes',
                 'action' => 'view',
                 $registro->sacerdote->id]) : '' ?>
      </td>
      <td>
        <?= $registro->has('funcion') ?
            $this->Html->link($registro->funcion->descripcion,
                ['controller' => 'Funciones',
                 'action' => 'view',
                 $registro->funcion->id]) : '' ?>
      </td>
      <td>
        <?= $registro->has('institucion') ?
            $this->Html->link($registro->institucion->descripcion,
                ['controller' => 'Instituciones',
                 'action' => 'view',
                 $registro->institucion->id]) : '' ?>
      </td>

      <td><?= $this->Time->format($registro->falta, 'dd/MM/YY') ?></td>
      <td>
          <?php
if (empty($registro->file_name))
{
  echo h($registro->protocolo);
}
else
{
  echo $this->html->link($registro->protocolo,
         ['action' => 'download', $registro->file_dir, $registro->file_name]);
}
          ?>
      </td>
      <td><?= $this->Time->format($registro->fbaja, 'dd/MM/YY') ?></td>
      <td><?= h($registro->orden) ?></td>
      <td class="actions" style="white-space:nowrap">
        <?= $this->Html->link('<i class="fa fa-pencil fa-lg"></i>',
                              ['action' => 'edit', $registro->id],
                              ['class'=>'btn btn-sm btn-primary', 'escape' => false]) ?>

        <?= $this->Form->postLink('<i class="fa fa-trash-o fa-lg"></i>',
                                  ['action' => 'delete', $registro->id],
                                  ['confirm' => '¿Desea borrar el registro?',
                                   'class'=>'btn btn-sm btn-danger', 'escape' => false]) ?>

        <?= $this->Html->link('<i class="fa fa-eye fa-lg"></i>',
                              ['action' => 'attach', $registro->id],
                              ['class'=>'btn btn-sm btn-default', 'escape' => false]) ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
