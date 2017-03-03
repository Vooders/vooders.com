<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $postCategory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $postCategory->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Post Categories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="postCategories form large-9 medium-8 columns content">
    <?= $this->Form->create($postCategory) ?>
    <fieldset>
        <legend><?= __('Edit Post Category') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('posts._ids', ['options' => $posts]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
