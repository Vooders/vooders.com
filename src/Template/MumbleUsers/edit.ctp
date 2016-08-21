<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $mumbleUser->user_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $mumbleUser->user_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Mumble Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Mumble Servers'), ['controller' => 'MumbleServers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mumble Server'), ['controller' => 'MumbleServers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mumbleUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($mumbleUser) ?>
    <fieldset>
        <legend><?= __('Edit Mumble User') ?></legend>
        <?php
            echo $this->Form->input('server_id', ['options' => $mumbleServers]);
            echo $this->Form->input('name');
            echo $this->Form->input('pw');
            echo $this->Form->input('lastchannel');
            echo $this->Form->input('last_active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
