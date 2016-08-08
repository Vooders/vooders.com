<?php
/**
 * Application: MED 0.1
 *
 * Framework: CakePHP 3.*.*
 *
 * Template / Element / Header
 * 
 */
$loggedIn = false;
$session = $this->request->session()->read('User.id');
if($session !== null) $loggedIn = true; 
?>
<header class="primary-header">
	<div class="row expanded top-header rel">
		<div class="columns small-12 medium-6">
			<a href="/">VOODERS.COM</a>
		</div>
		<div class="columns small-12 medium-6 float-right">
			<ul>
				<?php if($loggedIn): ?>
					<li><span class="icon-right icon--background__dropdown top-header--menu-item pad-left js-menu" data-id="account">Account</span></li>
				<?php endif; ?>
				<li><span class="icon-right icon--background__dropdown top-header--menu-item pad-left js-menu" data-id="support">Help</span></li>
			</ul>
		</div>
		<?php if($loggedIn): ?>
			<div class="menu--account top-header--dropdown-menu menu-section" style="display:none">
				<ul class="">
					<li class="top-header--dropdown-menu__item">
						<?= $this->Html->link(__('Dashboard'), [
							'controller'=>'Users',
							'action'=>'dashboard'
						],[
							'class'=>'text-white'
						]) ?>
					</li>
					<li class="top-header--dropdown-menu__item">
						<?= $this->Html->link(__('Log Out'), [
							'controller'=>'Users',
							'action'=>'logout'
						],[
							'class'=>'text-white'
						]) ?>
					</li>
				</ul>
			</div>
		<?php endif; ?>
		<div class="menu--support top-header--support-menu menu-section" style="display:none">
			<div class="small-12 columns">
				<p>This is the support menu!</p>
				<p>Here we can put helpfull things to help the users!</p>
			</div>
		</div>
	</div>
	<div class="row expanded bottom-header">
		<ul class="bottom-header--menu">
			<?php if($loggedIn): ?>
				<li class="">
					<?= $this->Html->link(__('Dashboard'), [
						'controller'=>'Users',
						'action'=>'dashboard'
					],[
						'class'=>'icon--bottom-header icon--background__dashboard bottom-header--menu-item'
					]) ?>
				</li>
			<?php else: ?>
				<li class="">
					<?= $this->Html->link(__('Login'), [
						'controller'=>'Users',
						'action'=>'login'
					],[
						'class'=>'icon--bottom-header icon--background__dashboard bottom-header--menu-item'
					]) ?>
				</li>
				<li class="">
					<?= $this->Html->link(__('Register'), [
						'controller'=>'Users',
						'action'=>'register'
					],[
						'class'=>'icon--bottom-header icon--background__projects bottom-header--menu-item'
					]) ?>
				</li>
			<?php endif; ?>
		</ul>
	</div>
<!--
		<nav class="columns small-12 medium-9 primary-nav">
			<ul class="primary-nav__group">
				<li class="primary-nav__item"><?= $this->Html->link(__('Home'), [
					'controller'=>'Pages',
					'action'=>'display',
					'home'
				],[
					'class'=>'primary-nav__link'
				]) ?></li>
				
				
				<li class="primary-nav__item"></li>
				<li class="primary-nav__item"></li>
			</ul>
		</nav>
-->	
	</div>
</header>
