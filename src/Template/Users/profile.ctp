<?php //debug($trustLevels);die; ?>
<section style="padding: 20px 80px; max-width: 1400px;">
	<?php if($isMine){ ?>
		<h2><?= __('Hello ').__($user->name_first) ?></h2>
		<h3><?= __('Welcome to you profile') ?></h3>
	<?php } else { ?>
		<h3><?= __('Welcome to '.$user->name_first.'\'s profile') ?></h3>

		<?php if(in_array($user->id, $myContacts, true)): ?>
      <?= $this->Form->postLink(__('Remove ').$user->name_first.__(' from your contacts'), [
			'action' => 'removeContact', $user->id
		]) ?>
    <?php else: ?>
      <?= $this->Html->link(__('Add ').$user->name_first.__(' to your contacts'), [
			'action' => 'newContact', $user->id
		]) ?>
    <?php endif; ?>

	<?php } ?>
	<h2><?= $isMine ? __('My Contacts') : __($user->name_first.'\'s Contacts') ?></h2>
	<?php if($isMine): ?>
		<?= $this->Html->link(__('My Account'), [
	      'controller' => 'Users',
	      'action' => 'myAccount'
	    ]) ?>
	    <?= '  |  ' ?>
		<?= $this->Html->link(__('Search for users'), [
			'controller' => 'Users',
			'action' => 'index'
		]) ?>
	<?php endif; ?>
	<table>
		<thead>
			<tr>
				<th><?= $this->Paginator->sort('user_contact_id', ['label' => 'Name']) ?></th>
				<th><?= $this->Paginator->sort('notes') ?></th>
				<?php if($isMine): ?>
					<th><?= $this->Paginator->sort('trust_level') ?></th>
					<th></th>
					<th><?= __('Actions') ?></th>
				<?php endif; ?>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($user->user_contacts as $contact): ?>
				<tr>
					<td>
						<?php
							foreach ($usernames as $username):								
								if($username->id === $contact->user_contact_id):
									echo $username->name_first . ' ' . $username->name_last;
								endif;
							endforeach;
						?>
					</td>
					<td><?= __($contact->notes) ?></td>
					<?php if($isMine): ?>
					<td>
						<?= $this->Form->create(null, [
							'url' => [
								'controller' => 'Users',
								'action' => 'changeTrustLevel'
							]
						]
						) ?>
						<?= $this->Form->input('trustLevel', [
							'options' => $trustLevels,
							'value' => $contact->trust_level,
							'label' => ''
						]) ?>
						<?= $this->Form->input('contactId', [
							'type' => 'hidden',
							'value' => $contact->id
						]) ?>
					</td>
					<td>
						<?= $this->Form->submit('Change') ?>
						<?= $this->Form->end() ?>
					</td>

							<td>
								<?= $this->Html->link(__('View Profile'), [
									'controller' => 'Users', 
									'action' => 'profile', $contact->user_contact_id
								]) ?>
								|
								 <?= $this->Form->postLink(__('Remove'), ['action' => 'removeContact', $contact->id]) ?>
								 |
								 <?= $this->Html->link(__('Export vCard'), [
									'controller' => 'Contacts', 
									'action' => 'exportCard', $contact->user_contact_id
								]) ?>
							</td>
						<?php endif; ?>
				</tr> 
			<?php endforeach; ?>
		</tbody>
	</table>
</section>