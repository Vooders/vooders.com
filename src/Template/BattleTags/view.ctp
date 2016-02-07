<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Battle Tag'), ['action' => 'edit', $battleTag->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Battle Tag'), ['action' => 'delete', $battleTag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $battleTag->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Battle Tags'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Battle Tag'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Hots Logs'), ['controller' => 'HotsLogs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Hots Log'), ['controller' => 'HotsLogs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="battleTags view large-9 medium-8 columns content">
    <h3><?= h($battleTag->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $battleTag->has('user') ? $this->Html->link($battleTag->user->id, ['controller' => 'Users', 'action' => 'view', $battleTag->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Tag') ?></th>
            <td><?= h($battleTag->tag) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($battleTag->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($battleTag->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($battleTag->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($battleTag->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Hots Logs') ?></h4>
        <?php if (!empty($battleTag->hots_logs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Battle Tag Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Hl Mmr') ?></th>
                <th><?= __('Qm Mmr') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($battleTag->hots_logs as $hotsLogs): ?>
            <tr>
                <td><?= h($hotsLogs->id) ?></td>
                <td><?= h($hotsLogs->user_id) ?></td>
                <td><?= h($hotsLogs->battle_tag_id) ?></td>
                <td><?= h($hotsLogs->name) ?></td>
                <td><?= h($hotsLogs->hl_mmr) ?></td>
                <td><?= h($hotsLogs->qm_mmr) ?></td>
                <td><?= h($hotsLogs->created) ?></td>
                <td><?= h($hotsLogs->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'HotsLogs', 'action' => 'view', $hotsLogs->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'HotsLogs', 'action' => 'edit', $hotsLogs->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'HotsLogs', 'action' => 'delete', $hotsLogs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hotsLogs->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
