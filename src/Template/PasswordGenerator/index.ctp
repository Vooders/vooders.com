<div class="col-lg-12">
    <div class="well bs-component">
		<h1>Password Generator</h1>

		<?= $this->Form->create(null, [
			'url' => [
				'controller' => 'PasswordGenerator',
				'action' => 'index'
			],
			'class' => 'form-horizontal'
		]); ?> 
		<fieldset>
			<legend>Replace your shitty human words with long secure nonsense.</legend>
			<?= $this->Form->password('username', [
				'type' => 'hidden'
			]) ?>
			<?= $this->Form->input('password', [
				'type' => 'hidden'
			]) ?>
            <div class="form-group">
				<?= $this->Form->input('input', [
					'label' => 'Enter your shitty human words',
					'type' => 'password',
					'autocomplete' => 'off',
					'class' => 'form-control',
					'value' => ''
				]) ?>
			</div>
		</fieldset>
		<?= $this->Form->submit('Generate', [
			'class' => 'btn btn-primary btn-lg'
		]) ?>
		<?= $this->Form->end(); ?>

		<?php if(isset($output)): ?>
			<div class="pad-top">
				<legend>Here is your long secure nonsense.</legend>
				<div class="alert alert-dismissible alert-success">
					<p style="margin:5px 0;"><?= $output ?></p>	
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>