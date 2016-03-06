<?php //debug($user);die; ?>
<div class="row">	
	<div class="small-12 columns">
		<p>Hello, <?= $user->username?>! Welcome to your profile</p>
	</div>
</div>

<div class="row">
	<div class="small-12 large-4 columns">
		
	<?php //debug($user); ?>
	</div>
	<div class="small-12 large-4 columns">
	</div>
	<div class="small-12 large-4 columns">	
		<h2>Account Details</h2>
		
		<?php if(!$user->battle_tag): ?>
			<p>You don't have a BattleTag on sytem.</p>
			<?= 
				$this->Form->create(null,[
					'url' => [
						'controller' => 'BattleTags',
								'action' => 'add'
					]
				])
			?>
			<?= $this->Form->input('tag', ['label' => 'BattleTag']) ?>
			<?= $this->Form->submit('Add BattleTag', ['class'  => 'button']) ?>
			<?= $this->Form->end() ?>
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
					<td>
						<a href="#" class="">Primary</a>
					</td>
				</tr>
			</tbody>
		</table>

	</div>
</div>
