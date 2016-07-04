<?php
$admin = false;
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Overwatch Character'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Overwatch Stats'), ['controller' => 'OverwatchStats', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Overwatch Stat'), ['controller' => 'OverwatchStats', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="overwatchCharacters index large-9 medium-8 columns content">
    <h3><?= __('Overwatch Characters') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('display_name') ?></th>
                <th><?= $this->Paginator->sort('api_name') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($overwatchCharacters as $overwatchCharacter): ?>
            <tr>
                <td><?= $this->Number->format($overwatchCharacter->id) ?></td>
                <td><?= h($overwatchCharacter->display_name) ?></td>
                <td><?= h($overwatchCharacter->api_name) ?></td>
                <td><?= h($overwatchCharacter->created) ?></td>
                <td><?= h($overwatchCharacter->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $overwatchCharacter->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $overwatchCharacter->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $overwatchCharacter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $overwatchCharacter->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
