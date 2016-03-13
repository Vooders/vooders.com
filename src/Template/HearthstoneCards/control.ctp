<div class="row">
	<div class="small-12 columns">
		<p>HearthStone Control Panel</p>
	</div>
</div>

<div class="row">
	<div class="small-10 columns">
		<div class="row">
			<div class="small-3 columns">
				<table>
					<th>Class Cards</th>
					<?php foreach ($totals->class as $name => $count): ?>
						<tr>
							<td><?= $name ?></td>
							<td><?= $count ?></td>
						</tr>
					<?php endforeach; ?>
				</table>
			</div>
			<div class="small-6 columns">&nbsp;</div>
			<div class="small-4 columns">&nbsp;</div>
		</div>
	</div>
	<div class="small-2 columns">
		<ul class="menu vertical">
			<li>
				<?= $this->Html->link('Get all cards', [
					'controller' => 'HearthstoneCards',
					'action' => 'fetchAllCards'
				])?>
			</li>
		</ul>
	</div>
</div>