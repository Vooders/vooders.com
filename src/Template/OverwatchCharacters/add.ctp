<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Overwatch Characters'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Overwatch Stats'), ['controller' => 'OverwatchStats', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Overwatch Stat'), ['controller' => 'OverwatchStats', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="overwatchCharacters form large-9 medium-8 columns content">
    <?= $this->Form->create($overwatchCharacter) ?>
    <fieldset>
        <legend><?= __('Add Overwatch Character') ?></legend>
        <?php
            echo $this->Form->input('display_name');
            echo $this->Form->input('api_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
