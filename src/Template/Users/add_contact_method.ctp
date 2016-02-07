<?php //debug($contact);die; ?>
<section style="padding: 20px 80px; max-width: 600px;">
<h2><?= __('Add a new contact method') ?></h2>
	<?= $this->Form->create($contact) ?>
	<?= $this->Form->input('type', [
		'type' => 'select',
		'options' => ['email'=>'Email', 'tel'=>'Tel', 'skype'=>'Skype']
	]) ?>
	<?= $this->Form->input('name', [
		'label' => 'Name: e.g work'
	]) ?>
	<?= $this->Form->input('contact', [
		'label' => 'Email, Tel or Skype name.'
	]) ?>
	<?= $this->Form->submit() ?>
	<?= $this->Form->end() ?>
</section>