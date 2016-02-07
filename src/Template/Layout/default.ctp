<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Vooders.com';
$session = $this->request->session();
$loggedIn = false;
if ($session->read('User.id') > 0)
  $loggedIn = true;
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
		<?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->Html->script('jquery-2.1.4.min') ?>
    <?= $this->Html->script('global') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $session->read('User.username') ?></a></h1>
            </li>
        </ul>
        <section class="top-bar-section">
            <ul class="right">   
              <?php if($loggedIn) : ?> 
                <li>
                <?=
                  $this->Html->link(__('My Profile'), [
                    'controller' => 'Users',
                    'action' => 'profile' , $session->read('User.id')
                  ])
                ?>
                </li>
                <li>
                  <?= 
                    $this->Html->link(__('Log Out'), [
                      'controller' => 'Users',
                      'action' => 'logout'
                    ]) 
                  ?>
                </li>
                
              <?php else: ?>
                 <li>
                  <?= 
                    $this->Html->link(__('Register'), [
                      'controller' => 'Users',
                      'action' => 'register'
                    ]) 
                  ?>
                </li>
                <li>
                <?= 
                  $this->Html->link(__('Log In'), [
                    'controller' => 'Users',
                    'action' => 'login'
                  ]) 
                ?>
              </li>
                <?php endif; ?>
                
            </ul>
        </section>
    </nav>
    <?= $this->Flash->render() ?>
    <section class="container clearfix">
        <?= $this->fetch('content') ?>
    </section>
    <footer>
    </footer>
</body>
</html>
