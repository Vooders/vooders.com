<?php 
	//debug($user);
?>
<div class="wrap">
	<div class="row">
		<div class="small-12 columns pad-top">
			<div class="small6 large-3 columns">
				<h3>Account Details</h3>
				<p><?= $user->user_emails[0]->email ?><br/>
				Last Login: <?= $user->last_access ?></p>
			</div>

			<div class="small6 large-3 columns">
				<h3>BattleTag</h3>
				<?php if(!$user->battle_tag): ?>
					<p>You don't have a BattleTag on sytem.</p>
					<a data-open="addBattleTag">Add a BattleTag</a>
				<?php else: ?>
					<p>BattleTag: <?= $user->battle_tag->tag ?></p>
				<?php endif; ?>
			</div>
			
			<div class="small6 large-3 columns">
				<h3>Mumble</h3>
				<?php if(!$mumbleUser): ?>
					<p>You are not registered to Mumble</p>
					<a data-open="addBattleTag">Register on Mumble</a>
				<?php else: ?>
					
					<p><?= $mumbleUser->name ?><br/>
					Last online: <?= $mumbleUser->last_active ?></p>
				<?php endif; ?>
			</div>
			
			<div class="small6 large-3 columns">
				<h3>Steam</h3>
				<p>Steam stuff</p>
			</div>
			<hr/>
		</div>

	</div>

	<div class="row pad-top">
		<div class="small-12 columns">
			<p>Hello, <?= $user->username?>! Welcome to your profile</p>
		</div>
	</div>


</div>
<div class="reveal" id="addEmail" data-reveal>
  <h2><?= __('Add a new email address') ?></h2>
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
		'label' => 'Email'
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