<?php //debug($user);die; ?>
<section style="padding: 20px 80px; max-width: 1400px;">
	<div class="portrait">
	
	</div>
	<div class="name-box">
		<?php if($isMine){ ?>
			<h2><?= $user->username ?></h2>
		<?php } else { ?>
			<h3><?= __($user->username.'\'s profile') ?></h3>

			<?php if(in_array($user->id, $myContacts, true)): ?>
				<?= $this->Form->postLink(__('Remove ').$user->username.__(' from your contacts'), [
				'action' => 'removeContact', $user->id
			]) ?>
			<?php else: ?>
				<?= $this->Html->link(__('Add ').$user->username.__(' to your contacts'), [
				'action' => 'newContact', $user->id
			]) ?>
			<?php endif; ?>
		<?php } ?>
	</div>
	<hr/>
</section>