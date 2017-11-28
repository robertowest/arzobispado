<div class="box-body">
    <dl class="dl-horizontal">
        <dt>Año</dt>
        <dd><?= h($registro->año) ?></dd>

        <dt>Protocolo</dt>
        <dd><?= h($registro->protocolo) ?></dd>

        <dt>Tipo</dt>
        <dd><?= $registro->protocolo_tipo->path ?></dd>
    </dl>
</div>

<!-- agregado para trabajar con Documents -->
<div class="box-body">
    <div class="pull-right">
      <?= $this->Html->link('<i class="fa fa-plus"></i> Nuevo Documentos',
            ['controller' => 'Documents', 'action' => 'add', $this->name, $registro->id, 
             //'path'=>$registro->protocolo_tipo->path, 'year'=>$registro->año
            ],
            ['escape' => false, 'class'=>'btn btn-success btn-xs']) //pull-right ?>
    </div>

    <h3>Documentos asociados</h3>

    <?php if (!empty($registro->documents)): ?>
    <table class="table table-hover">
      <tr>
        <th>Nro.</th>
        <th>Descripción</th>
        <th>Archivo</th>
        <th>Acciones</th>
      </tr>
      <?php foreach ($registro->documents as $registro): ?>
        <tr>
          <td><?= $this->Number->format($registro->id) ?></td>
          <td><?= h($registro->name) ?></td>
          <td><?= h($registro->filename) ?></td>

          <td class="actions actions-btn1" style="white-space:nowrap">
            <?= $this->Html->link('<i class="fa fa-pencil fa-lg"></i>',
                    ['controller' => 'Documents', 'action' => 'edit', $registro->id],
                    ['class'=>'btn-default', 'escape' => false]) ?>
                    
            <?= $this->Form->postLink('<i class="fa fa-trash-o fa-lg"></i>',
                    ['controller' => 'Documents', 'action' => 'delete', $registro->id, 'urlback'=>$this->request->url],
                    ['confirm' => '¿Desea borrar el registro y archivo del servidor?',
                     'class'=>'btn-default', 'escape' => false]) ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
    <?php endif; ?>

</div>
