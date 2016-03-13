<?php 
	
?>
<div class="row">	
	<div class="small-12 columns">
		<p>Hello, <?= $user->username?>! Welcome to your profile</p>
	</div>
</div>

<div class="row">
	<div class="small-12 large-4 columns"></div>
	<div class="small-12 large-4 columns"></div>
	<div class="small-12 large-4 columns">	
		<h2>Account Details</h2>

		<?php if(!$user->battle_tag): ?>
			<p>You don't have a BattleTag on sytem.</p>
			<a data-open="addBattleTag">Add a BattleTag</a>
		<?php else: ?>
			<p>BattleTag: <?= $user->battle_tag->tag ?></p>
		<?php endif; ?>

		<p>
			Join Date: <?= $user->created ?><br/>
			Last Login: <?= $user->last_access ?>
		</p>

		<table>
			<thead>
				<tr>
					<th>
						Email Addresses
					</th>
					<th>
						<a data-open="addEmail">Add Email</a>
						
					</th>
				</tr>
			</thead>	
			<tbody>
				<tr>
					<?php 
						foreach ($user->user_emails as $email) {
							echo '<td>';
							echo $email->email;
							echo '</td>';
						}
					?>
					
				</tr>
			</tbody>
		</table>
	</div>
</div>
<div class="reveal" id="addEmail" data-reveal>
  <h2><?= __('Add a new contact method') ?></h2>
	<?= $this->Form->create(null, [
		'url' => [
			'controller' => 'Users',
			'action' => 'x'
		] 
	]) ?>
	<?= $this->Form->input('name', [
		'label' => 'Name: e.g work'
	]) ?>
	<?= $this->Form->input('contact', [
		'label' => 'Email, Tel or Skype name.'
	]) ?>
	<?= $this->Form->submit() ?>
	<?= $this->Form->end() ?>
  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<div class="reveal" id="addBattleTag" data-reveal>
	<h4>Add a BattleTag to allow us to pull BattleNet data for your account.</h4>
	<?= 
		$this->Form->create(null,[
			'url' => [
				'controller' => 'BattleTags',
						'action' => 'add'
			]
		])
	?>
	<?= $this->Form->input('tag', ['label' => 'BattleTag']) ?>

	<?= $this->Form->radio('Region', [
		['value' => 'AM', 'text' => 'Americas'],
		['value' => 'EU', 'text' => 'Europe', 'checked' => true],
		['value' => 'AS', 'text' => 'Asia'],
		['value' => 'CH', 'text' => 'China']
	]) ?>

	<?= $this->Form->submit('Add BattleTag', ['class'  => 'button']) ?>
	<?= $this->Form->end() ?>
</div>