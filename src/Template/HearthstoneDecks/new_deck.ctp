<div class="row">
	<div class="small-4 columns">&nbsp;</div>
	<div class="small-4 columns">
		<h2>Create a new deck</h2>
		<?= $this->Form->create(null,[
			'url' => [
				'controller' => 'HearthstoneDecks',
				'action' => 'newDeck'
			]
		])?>
		<?= $this->Form->input('name') ?>
		<?= $this->Form->submit('Create', ['class' => 'button']) ?>
		<?= $this->Form->end() ?>
	</div>
	<div class="small-4 columns">&nbsp;</div>
</div>