<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Protocolo Campo Contenido'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Protocolo Campos'), ['controller' => 'ProtocoloCampos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Protocolo Campo'), ['controller' => 'ProtocoloCampos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="protocoloCampoContenido index large-9 medium-8 columns content">
    <h3><?= __('Protocolo Campo Contenido') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('protocolo_campo_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('campo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($protocoloCampoContenido as $protocoloCampoContenido): ?>
            <tr>
                <td><?= $this->Number->format($protocoloCampoContenido->id) ?></td>
                <td><?= $protocoloCampoContenido->has('protocolo_campo') ? $this->Html->link($protocoloCampoContenido->protocolo_campo->id, ['controller' => 'ProtocoloCampos', 'action' => 'view', $protocoloCampoContenido->protocolo_campo->id]) : '' ?></td>
                <td><?= h($protocoloCampoContenido->campo) ?></td>
                <td><?= h($protocoloCampoContenido->created) ?></td>
                <td><?= h($protocoloCampoContenido->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $protocoloCampoContenido->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $protocoloCampoContenido->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $protocoloCampoContenido->id], ['confirm' => __('Are you sure you want to delete # {0}?', $protocoloCampoContenido->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
