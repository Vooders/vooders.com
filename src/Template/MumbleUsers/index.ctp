<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Mumble User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Mumble Servers'), ['controller' => 'MumbleServers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mumble Server'), ['controller' => 'MumbleServers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mumbleUsers index large-9 medium-8 columns content">
    <h3><?= __('Mumble Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('server_id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('pw') ?></th>
                <th><?= $this->Paginator->sort('lastchannel') ?></th>
                <th><?= $this->Paginator->sort('last_active') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mumbleUsers as $mumbleUser): ?>
            <tr>
                <td><?= $mumbleUser->has('mumble_server') ? $this->Html->link($mumbleUser->mumble_server->server_id, ['controller' => 'MumbleServers', 'action' => 'view', $mumbleUser->mumble_server->server_id]) : '' ?></td>
                <td><?= $mumbleUser->has('user') ? $this->Html->link($mumbleUser->user->id, ['controller' => 'Users', 'action' => 'view', $mumbleUser->user->id]) : '' ?></td>
                <td><?= h($mumbleUser->name) ?></td>
                <td><?= h($mumbleUser->pw) ?></td>
                <td><?= $this->Number->format($mumbleUser->lastchannel) ?></td>
                <td><?= h($mumbleUser->last_active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mumbleUser->user_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mumbleUser->user_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mumbleUser->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $mumbleUser->user_id)]) ?>
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
