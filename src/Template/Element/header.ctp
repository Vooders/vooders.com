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
	<div class="row top-header rel">
		<div class="columns small-12 medium-6">
			<a href="/" class="main-logo">VOODERS.COM</a>
		</div>
		<div class="columns small-12 medium-6 float-right">
			<ul>
				<?php if($loggedIn): ?>
					<li><span class="icon-right icon--background__dropdown top-header--menu-item pad-left js-menu" data-id="support">MENU</span></li>
				<?php else: ?>
				<li>
					<?= $this->Html->link(__('Log In'), [
						'controller'=>'Users',
						'action'=>'login'
					],[
						'class'=>'icon-right icon--background__dropdown top-header--menu-item pad-left'
					]) ?>
				</li>
				<?php endif; ?>
			</ul>
		</div>
		<?php if($loggedIn): ?>
			<div class="menu--account top-header--dropdown-menu menu-section" style="display:none">
				<ul class="">
					<li class="top-header--dropdown-menu__item">
						
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
		
	</div>
	<div class='row expanded'>
		<div class="menu--support top-header--support-menu menu-section" style="display:none">
			<div class="small-12 columns">
				<div class="row ">
					<div class="small-12 columns bottom-header">
						<ul class='bottom-header--menu'>
							
							<li class='bottom-header--menu-item large-2 medium-4 small-6 text-white'>Account</li>
							<li class='bottom-header--menu-item large-2 medium-4 small-6'>
								<?= $this->Html->link(__('Profile'), [
									'controller'=>'Users',
									'action'=>'profile'
								],[
									'class'=>'text-white'
								]) ?>
							</li>
							<li class='bottom-header--menu-item large-2 medium-4 small-6'>
								<?= $this->Html->link(__('API Keys'), [
									'controller'=>'Users',
									'action'=>'apiKeys'
								],[
									'class'=>'text-white'
								]) ?>
							</li>
							<li class='bottom-header--menu-item large-2 medium-4 small-6'>
								<?= $this->Html->link(__('Mumble'), [
									'controller'=>'Pages',
									'action'=> 'mumble'
								],[
									'class'=>'text-white'
								]) ?>
							</li>
							<li class='bottom-header--menu-item large-2 medium-4 small-6'>
								<a href="" class="text-white">Thing</a>
							</li>
							<li class='bottom-header--menu-item no-border large-2 medium-4 small-6'>
								<a href="https://git.vooders.com" class="text-white">Git</a>
							</li>

						</ul>
					</div>
				</div>
				<div class="row">
					<div class="small-12 columns bottom-main">
						<ul class='bottom-main--menu'>
							<li class='bottom-main--menu-item medium-4 small-6'>
								<?= $this->Html->link(__('HOTS'), [
									'controller'=>'Users',
									'action'=>'profile'
								],[
									'class'=>'text-white'
								]) ?>
							</li>
							<li class='bottom-main--menu-item medium-4 small-6'>
								<?= $this->Html->link(__('Steam'), [
									'controller'=>'Users',
									'action'=>'apiKeys'
								],[
									'class'=>'text-white'
								]) ?>
							</li>
							<li class='bottom-main--menu-item no-border medium-4 small-6'>
								<?= $this->Html->link(__('OverWatch'), [
									'controller'=>'OverwatchStats',
									'action'=> 'index'
								],[
									'class'=>'text-white'
								]) ?>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
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
