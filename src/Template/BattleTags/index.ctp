<div class="battleTags index large-9 medium-8 columns content">
	<h3><?= __('Battle Tags') ?></h3>
	<table cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<th><?= $this->Paginator->sort('id') ?></th>
				<th><?= $this->Paginator->sort('user_id') ?></th>
				<th><?= $this->Paginator->sort('tag') ?></th>
				<th><?= $this->Paginator->sort('name') ?></th>
				<th><?= $this->Paginator->sort('created') ?></th>
				<th><?= $this->Paginator->sort('modified') ?></th>
				<th class="actions"><?= __('Actions') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($battleTags as $battleTag): ?>
			<tr>
				<td><?= $this->Number->format($battleTag->id) ?></td>
				<td><?= $battleTag->has('user') ? $this->Html->link($battleTag->user->id, ['controller' => 'Users', 'action' => 'view', $battleTag->user->id]) : '' ?></td>
				<td><?= h($battleTag->tag) ?></td>
				<td><?= h($battleTag->name) ?></td>
				<td><?= h($battleTag->created) ?></td>
				<td><?= h($battleTag->modified) ?></td>
				<td class="actions">
					<?= $this->Html->link(__('View'), ['action' => 'view', $battleTag->id]) ?>
					<?= $this->Html->link(__('Edit'), ['action' => 'edit', $battleTag->id]) ?>
					<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $battleTag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $battleTag->id)]) ?>
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
