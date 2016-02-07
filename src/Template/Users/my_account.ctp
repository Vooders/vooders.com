<?php //debug($user);die; ?>
<section style="padding: 20px 80px; max-width: 1800px;">
	<h2><?= __('My Account') ?></h2>
	<hr/>
		<?= $this->Html->link(__('My Profile'), [
      'controller' => 'Users',
      'action' => 'profile', $this->request->session()->read('User.id')
    ]) ?>
    <?= '  |  ' ?>
    <?= $this->Html->link(__('Search Members'), [
			'action' => 'index'
		]) ?>
		<?= '  |  ' ?>
		<?= $this->Html->link(__('Change Timezone'), [
			'action' => 'changeTimezone'
		]) ?>
	<hr/>
		<?= $this->Html->link(__('Add Contact Method'), [
      'controller' => 'Users',
      'action' => 'addContactMethod'
    ]) ?>
    <?= '  |  ' ?>
    <?= $this->Html->link(__('Add New Address'), [
			'action' => 'addAddress'
		]) ?>
		<?= '  |  ' ?>
		<?= $this->Html->link(__('Add New Contact via vCard'), [
			'controller' => 'Contacts',
			'action' => 'uploadCard'
		]) ?>
	<hr/>
	<h2><?= __('My Contact Methods') ?></h2>
	<table>
		<thead>
			<tr>
				<th><?= $this->Paginator->sort('type') ?></th>
				<th><?= $this->Paginator->sort('name') ?></th>
				<th><?= $this->Paginator->sort('contact') ?></th>
				<th><?= $this->Paginator->sort('verified') ?></th>
				<th><?= __('Prefered Contact') ?></th>
				<th><?= __('Actions') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($user->user_contacts as $contact): ?>
				<tr>
					<td><?= __($contact->type) ?></td>
					<td><?= __($contact->name) ?></td>
					<td><?= __($contact->contact) ?></td>
					<td>
					<?php if($contact->type == 'email'): ?> 
							<?= $contact->verified ? __('Verified') : 
								$this->Html->link('Verify', [
									'controller' => 'Users',
									'action' => 'verifyEmail', $contact->id 
								])
							?>
					<?php elseif($contact->type == 'mobile'): ?>
						<?php 
							if($contact->verified){ 
								echo __('Verified');
							} else {
								if($contact->pin === null){
									echo $this->Html->link('Verify', [
										'controller' => 'Users',
										'action' => 'sendCode', $contact->id 
									]);
								} else {
									echo $this->Html->link('Enter PIN', [
										'controller' => 'Users',
										'action' => 'checkPin', $contact->id 
									]);
									echo ' | ';
									echo $this->Html->link('Re-send code', [
										'controller' => 'Users',
										'action' => 'sendCode', $contact->id 
									]);
								}
							}		
						?>
					<?php else: ?>
						<?= __('This contact type cannot be verified, yet.') ?>
					<?php endif; ?>
					</td>
					<td>
					
					<?=
						$contact->verified ?
							($contact->id === $user->preferred_contact) ?
								__('Preferred Contact') :
								$this->Html->link('Set as preferred', [
									'controller' => 'Users',
									'action' => 'setPreferredContact', $contact->id
							])
						:
						__('Verify to set as preferred')
					?>
				
					</td>
					<td>
						<?= $this->Form->postLink(__('Delete'), ['action' => 'removeContactMethod', $contact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contact->id)]) ?>
					</td>
				</tr> 
			<?php endforeach; ?>
		</tbody>
	</table>
	<h2><?= __('My Addresses') ?></h2>
	<table>
		<thead>
			<tr>
				<th><?= $this->Paginator->sort('name') ?></th>
				<th><?= $this->Paginator->sort('country_id') ?></th>
				<th><?= $this->Paginator->sort('address_1') ?></th>
				<th><?= $this->Paginator->sort('address_2') ?></th>
				<th><?= $this->Paginator->sort('address_3') ?></th>
				<th><?= $this->Paginator->sort('town') ?></th>
				<th><?= $this->Paginator->sort('state') ?></th>
				<th><?= $this->Paginator->sort('postcode') ?></th>
				<th><?= __('Actions') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($user->addresses as $address): ?>
				<tr>
					<td><?= __($address->name) ?></td>
					<td><?= __($address->country_id) ?></td>
					<td><?= __($address->address_1) ?></td>
					<td><?= __($address->address_2) ?></td>
					<td><?= __($address->address_3) ?></td>
					<td><?= __($address->town) ?></td>
					<td><?= __($address->state) ?></td>
					<td><?= __($address->postcode) ?></td>
					<td>
						<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contact->id)]) ?>
					</td>
				</tr> 
			<?php endforeach; ?>
		</tbody>
	</table>
	<div style="max-width: 400px;">
		<h3><?= __('Change your password') ?></h3>
		<?= $this->Form->create(null, [
			'url' => [
				'controller' => 'Users',
				'action' => 'changePassword'
			]
		]) ?>

		<?= $this->Form->input('oldPassword', [
			'label' => 'Current Password',
			'type' => 'password',
			'class' => 'old-pass'
		]) ?>
		<span class="info-span"></span>
		<?= $this->Form->input('password', [
			'label' => 'New Password',
			'type' => 'password',
			'disabled' => true,
			'class' => ['new-pass', 'box1']
		]) ?>

		<?= $this->Form->input('confirm', [
			'label' => 'Confirm New Password',
			'type' => 'password',
			'disabled' => true,
			'class' => ['conf-pass', 'box2']
		]) ?>

		<?= $this->Form->submit('Submit', [
			'class' => 'submitButton',
			'disabled' => true
		]) ?>
		<?= $this->Form->end() ?>
	</div>
</section>