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
<header class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<a href="/" class="navbar-brand">VOODERS.COM</a>
		</div>

		<div id="navbar-main" class="navbar-collapse collapse">
			<?php if($loggedIn): ?>
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="tools">Tools<span class="caret"></span></a>
						<ul class="dropdown-menu" aria-labelledby="tools">
							<li><a href="/password-generator">Password Generator</a></li>

						</ul>
            		</li>
            <!--
            		<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="tools">Guides<span class="caret"></span></a>
						<ul class="dropdown-menu" aria-labelledby="tools">

						</ul>
            		</li>
            		<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="tools">Downloads<span class="caret"></span></a>
						<ul class="dropdown-menu" aria-labelledby="tools">

						</ul>
            		</li>
            -->
            		<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="random">Random<span class="caret"></span></a>
						<ul class="dropdown-menu" aria-labelledby="random">
							<li><a href="/mandelbrot">The Mandelbrot set</a></li>
						</ul>
            		</li>
				</ul>
			<?php endif; ?>

			<ul class="nav navbar-nav navbar-right">
				<?php if($loggedIn): ?>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="tools">Account<span class="caret"></span></a>
						<ul class="dropdown-menu" aria-labelledby="tools">
							<li><a href="/dashboard">Dashboard</a></li>
							<!--<li><a href="/profile">Profile</a></li>-->
							<li class="divider"></li>
							<li>
								<?= $this->Html->link(__('Log Out'), [
									'controller'=>'Users',
									'action'=>'logout'
								],[
									'class'=>'icon-right icon--background__dropdown top-header--menu-item pad-left'
								]) ?>
							</li>
						</ul>
            		</li>
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
	</div>
</header>
