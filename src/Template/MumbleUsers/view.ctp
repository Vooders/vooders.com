<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Mumble User'), ['action' => 'edit', $mumbleUser->user_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mumble User'), ['action' => 'delete', $mumbleUser->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $mumbleUser->user_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Mumble Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mumble User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Mumble Servers'), ['controller' => 'MumbleServers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mumble Server'), ['controller' => 'MumbleServers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mumbleUsers view large-9 medium-8 columns content">
    <h3><?= h($mumbleUser->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Mumble Server') ?></th>
            <td><?= $mumbleUser->has('mumble_server') ? $this->Html->link($mumbleUser->mumble_server->server_id, ['controller' => 'MumbleServers', 'action' => 'view', $mumbleUser->mumble_server->server_id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $mumbleUser->has('user') ? $this->Html->link($mumbleUser->user->id, ['controller' => 'Users', 'action' => 'view', $mumbleUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($mumbleUser->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Pw') ?></th>
            <td><?= h($mumbleUser->pw) ?></td>
        </tr>
        <tr>
            <th><?= __('Lastchannel') ?></th>
            <td><?= $this->Number->format($mumbleUser->lastchannel) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Active') ?></th>
            <td><?= h($mumbleUser->last_active) ?></td>
        </tr>
    </table>
</div>
