<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $battleTag->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $battleTag->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Battle Tags'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Hots Logs'), ['controller' => 'HotsLogs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Hots Log'), ['controller' => 'HotsLogs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="battleTags form large-9 medium-8 columns content">
    <?= $this->Form->create($battleTag) ?>
    <fieldset>
        <legend><?= __('Edit Battle Tag') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('tag');
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
