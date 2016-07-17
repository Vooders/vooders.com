<div class="row">
	<div class="small-12 columns marg-top">
		<h1>Password Generator</h1>
		<p>Replace your shitty human words with long secure nonsense.</p>
		<hr/>
		<?= $this->Form->create(null, [
			'url' => [
				'controller' => 'PasswordGenerator',
				'action' => 'index'
			]
		]); ?> 
		<?= $this->Form->password('username', [
			'type' => 'hidden'
		]) ?>
		<?= $this->Form->input('password', [
			'type' => 'hidden'
		]) ?>
		<?= $this->Form->input('input', [
			'label' => 'Enter your shitty human words',
			'type' => 'password',
			'autocomplete' => 'off'
		]) ?>
		<?= $this->Form->submit('Generate', [
			'class' => 'button'
		]) ?>
		<?= $this->Form->end(); ?>
	</div>
	<?php if(isset($output)): ?>
		<div class="small-12 columns pad-top">
			<p>Here is your long secure nonsense.</p>
			<div class="" style="border:1px solid #333; background-color:#fff; overflow-y:scroll;">
				<p style="margin:5px 0;"><?= $output ?></p>	
			</div>
		</div>
	<?php endif; ?>
</div>