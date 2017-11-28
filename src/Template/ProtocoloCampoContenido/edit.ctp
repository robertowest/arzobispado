<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $protocoloCampoContenido->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $protocoloCampoContenido->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Protocolo Campo Contenido'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Protocolo Campos'), ['controller' => 'ProtocoloCampos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Protocolo Campo'), ['controller' => 'ProtocoloCampos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="protocoloCampoContenido form large-9 medium-8 columns content">
    <?= $this->Form->create($protocoloCampoContenido) ?>
    <fieldset>
        <legend><?= __('Edit Protocolo Campo Contenido') ?></legend>
        <?php
            echo $this->Form->control('protocolo_campo_id', ['options' => $protocoloCampos]);
            echo $this->Form->control('campo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
