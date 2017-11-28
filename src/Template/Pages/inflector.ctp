<?php
use Cake\Utility\Inflector;
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
    </ul>
</nav>
<div class="articles form large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend>Probar Inflector::rule()</legend>
        <?= $this->Form->control('texto') ?>
    </fieldset>
    <?= $this->Form->button('Probar') ?>
    <?= $this->Form->end() ?>
</div>
<div class="articles index large-9 medium-8 columns content">
    <?php
    if (!empty($this->request->data))
    {
    ?>

    <section class="content">

      <table>
        <tr>
            <td>pluralize</td>
            <td><?= Inflector::pluralize($this->request->data['texto']) ?></td>
        </tr>
        <tr>
            <td>singularize</td>
            <td><?= Inflector::singularize($this->request->data['texto']) ?></td>
        </tr>
        <tr>
            <td>camelize</td>
            <td><?= Inflector::camelize($this->request->data['texto']) ?></td>
        </tr>
        <tr>
            <td>underscore</td>
            <td><?= Inflector::underscore($this->request->data['texto']) ?></td>
        </tr>
        <tr>
            <td>humanize</td>
            <td><?= Inflector::humanize($this->request->data['texto']) ?></td>
        </tr>
        <tr>
            <td>classify</td>
            <td><?= Inflector::classify($this->request->data['texto']) ?></td>
        </tr>
        <tr>
            <td>dasherize</td>
            <td><?= Inflector::dasherize($this->request->data['texto']) ?></td>
        </tr>
        <tr>
            <td>tableize</td>
            <td><?= Inflector::tableize($this->request->data['texto']) ?></td>
        </tr>
        <tr>
            <td>variable</td>
            <td><?= Inflector::variable($this->request->data['texto']) ?></td>
        </tr>
        <tr>
            <td>slug</td>
            <td><?= Inflector::slug($this->request->data['texto']) ?></td>
        </tr>
      </table>

    </section>

    <?php
    }
    ?>

</div>