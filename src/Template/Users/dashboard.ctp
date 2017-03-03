<?php 
	//debug($user);
$session = $this->request->session();
?>
<div class="col-lg-9">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2>Dashboard</h2>
		</div>
		<div class="panel-body js-dashboard-container">
			
		</div>
	</div>
</div>
<div class="col-lg-3">
	<div class="panel panel-primary ">
		<div class="panel-heading js-reveal-trigger" data-id="account">
			<h3 class="panel-title">Account Details</h3>
		</div>
		<div class="panel-body js-reveal-div-account">
			<div class="row">
				<div class="col-lg-4">
					<span class="js-reveal-trigger" data-id="profile"  data-toggle="tooltip" data-placement="left" title="" data-original-title="Click to upload profile picture">
						<?php if($user->profile_pic): ?>
							<img src="<?= $user->profile_pic->rel_file_path ?>" width="65px" >
						<?php else: ?>
							<img src="/img/profile-placeholder.jpg" width="65px">
						<?php endif; ?>
					</span>
				</div>
				<div class="col-lg-8">
					<h5 class="marg-bottom--none"><?= $user->username ?></h5>
					<?php if($user->is_vooders): ?>
						<small class="text-danger">Super Admin</small>
					<?php elseif($user->admin): ?>
						<h6 class="text-info">Admin</h6>
					<?php else: ?>
						<h6 class="text-primary">User</h6>
					<?php endif; ?>
				</div>
			</div>
			
			<div class="js-reveal-div-profile row" style="display:none">
				<div class="col-sm-12 columns">
					<h5>Upload a profile picture</h5>
					<?= $this->element('image-uploader2') ?>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12 pad-top--small">
					<p><?= $user->user_emails[0]->email ?><br/>
					<br/>
					Joined: <?= $user->created ?><br/>
					Logged in at: <?= $user->last_access ?><br/>
					Last Login: <?= $session->read('User.lastAccess') ?></p>
				</div>
			</div>
			
		</div>
	</div>

	<?php if($user->is_vooders): ?>
		<div class="panel panel-default">
			<div class="panel-heading js-reveal-trigger" data-id="users">
				<h3 class="panel-title">Users</h3>
			</div>
			<div class="panel-body js-reveal-div-users">
				<div class="list-group">
					<?php foreach($users as $u): ?>
						<a href="#" class="list-group-item">
							<h6 class="list-group-item-heading"><?= $u->username ?></h6>
							<h6 class="list-group-item-text"><small><?= $u->last_access ?></small></h6>
						</a>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<div class="panel panel-default">
		<div class="panel-heading js-reveal-trigger" data-id="mumble">
			<h3 class="panel-title">Mumble Server </h3>
		</div>
		<div class="panel-body js-reveal-div-mumble">
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
		<div class="panel-heading js-reveal-trigger" data-id="battleTag">
			<h3 class="panel-title">BattleTag</h3>
		</div>
		<div class="panel-body js-reveal-div-battleTag" style="display: none;">
			<?php if(!$user->battle_tag): ?>
				<p>You don't have a BattleTag on sytem.</p>
				<a data-open="addBattleTag">Add a BattleTag</a>
			<?php else: ?>
				<p>BattleTag: <?= $user->battle_tag->tag ?></p>
			<?php endif; ?>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading js-reveal-trigger" data-id="steam">
			<h3 class="panel-title">Steam</h3>
		</div>
		<div class="panel-body js-reveal-div-battleTag" style="display: none;">
				<p>Steam stuff</p>
		</div>
	</div>
</div>

