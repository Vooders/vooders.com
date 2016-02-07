<section style="padding: 20px 80px; max-width: 600px;">
<h2><?= __('Add a new address') ?></h2>
	<?= $this->Form->create($address) ?>
	<?= $this->Form->input('name') ?>
	<?= $this->Form->input('address_1') ?>
	<?= $this->Form->input('address_2') ?>
	<?= $this->Form->input('address_3') ?>
	<?= $this->Form->input('town') ?>
	<?= $this->Form->input('state') ?>
	<?= $this->Form->input('postcode') ?>
	<?= $this->Form->submit() ?>
	<?= $this->Form->end() ?>
</section>