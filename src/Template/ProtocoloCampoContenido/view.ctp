<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Protocolo Campo Contenido'), ['action' => 'edit', $protocoloCampoContenido->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Protocolo Campo Contenido'), ['action' => 'delete', $protocoloCampoContenido->id], ['confirm' => __('Are you sure you want to delete # {0}?', $protocoloCampoContenido->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Protocolo Campo Contenido'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Protocolo Campo Contenido'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Protocolo Campos'), ['controller' => 'ProtocoloCampos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Protocolo Campo'), ['controller' => 'ProtocoloCampos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="protocoloCampoContenido view large-9 medium-8 columns content">
    <h3><?= h($protocoloCampoContenido->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Protocolo Campo') ?></th>
            <td><?= $protocoloCampoContenido->has('protocolo_campo') ? $this->Html->link($protocoloCampoContenido->protocolo_campo->id, ['controller' => 'ProtocoloCampos', 'action' => 'view', $protocoloCampoContenido->protocolo_campo->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Campo') ?></th>
            <td><?= h($protocoloCampoContenido->campo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($protocoloCampoContenido->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($protocoloCampoContenido->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($protocoloCampoContenido->modified) ?></td>
        </tr>
    </table>
</div>
