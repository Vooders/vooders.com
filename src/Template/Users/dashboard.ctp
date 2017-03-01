<?php 
	//debug($user);
$session = $this->request->session();
?>
<div class="col-lg-9">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2>Dashboard</h2>
		</div>
		<div class="panel-body">
			<?php if($user->is_vooders): ?>
				<h6 class="text-info">Vooders</h6>
			<?php else: ?>
				<h6 class="text-primary">User</h6>
			<?php endif; ?>
			<?= debug($user) ?>
		</div>
	</div>
</div>
<div class="col-lg-3">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Account Details</h3>
		</div>
		<div class="panel-body">
			<div class="col-lg-8">
				<h6><?= $user->username ?></h6>
			</div>
			<div class="col-lg-4 text-right">
				<?php if($user->is_vooders): ?>
					<h6 class="text-danger">Vooders</h6>
				<?php elseif($user->admin): ?>
					<h6 class="text-info">Admin</h6>
				<?php else: ?>
					<h6 class="text-primary">User</h6>
				<?php endif; ?>
			</div>
			<div class="col-lg-12">
				<p><?= $user->user_emails[0]->email ?><br/>
				<br/>
				Joined: <?= $user->created ?><br/>
				Logged in at: <?= $user->last_access ?><br/>
				Last Login: <?= $session->read('User.lastAccess') ?></p>
			</div>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Mumble Server </h3>
		</div>
		<div class="panel-body">
			<legend>Server Info:</legend>
				<p>Address: <span class="text-primary">mumble.vooders.com</span></p>
				<p>Port: <span class="text-primary">64738</span></p>
			<legend>User Data</legend>
				<?php if(!$mumbleUser): ?>
					<p>You are not registered to Mumble</p>
				<?php else: ?>
					<p><?= $mumbleUser->name ?><br/>
					Last online: <?= $mumbleUser->last_active ?></p>
				<?php endif; ?>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">BattleTag</h3>
		</div>
		<div class="panel-body">
				<?php if(!$user->battle_tag): ?>
					<p>You don't have a BattleTag on sytem.</p>
					<a data-open="addBattleTag">Add a BattleTag</a>
				<?php else: ?>
					<p>BattleTag: <?= $user->battle_tag->tag ?></p>
				<?php endif; ?>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Steam</h3>
		</div>
		<div class="panel-body">
				<p>Steam stuff</p>
		</div>
	</div>
</div>

