<div class="battleTags form large-9 medium-8 columns content">
	<?= $this->Form->create($battleTag) ?>
	<fieldset>
		<legend><?= __('Add Battle Tag') ?></legend>
		<?php
			echo $this->Form->input('tag');
			echo $this->Form->input('name');
		?>
	</fieldset>
	<?= $this->Form->button(__('Submit')) ?>
	<?= $this->Form->end() ?>
</div>
