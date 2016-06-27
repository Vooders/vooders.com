<?php
$session = $this->request->session();
$loggedIn = false;
if ($session->read('User.id') > 0)
    $loggedIn = true;
?>
<div class="title-bar rel">
    <div class="title-bar-left wrap">
        <a href="/" class="title-bar-title text-white">Vooders.com</a>
    </div>

    <div class="title-bar-right ">
        <div class="menu-container">
            <button class="menu-icon" type="button" data-toggle="topMenu"></button>
        </div>
        <div class="row float-right">
            <?php if($loggedIn): ?>
                <p class="text-right"><?= $session->read('User.username') ?></p>
            <?php else: ?>
                <p class="text-right">Not Logged In</p>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="dropdown-pane nav-user-menu" id="topMenu" data-dropdown data-auto-focus="true">
                <div class="">
                    <div class="small-12 columns marg--none pad--none">
                        <ul class="menu vertical right">
                            <?php if($loggedIn) : ?>
                            <li class="menu-li">
                                <?=
                                    $this->Html->link(__('My Profile'), [
                                        'controller' => 'Users',
                                        'action' => 'profile'
                                    ],[
                                        'class' => 'nav-user-menu__anchor'
                                    ])
                                ?>
                            </li>
                            <li class="menu-li">
                                <?=
                                    $this->Html->link(__('Log Out'), [
                                        'controller' => 'Users',
                                        'action' => 'logout'
                                    ],[
                                        'class' => 'nav-user-menu__anchor'
                                    ])
                                ?>
                            </li>
                            <?php else: ?>
                            <li class="menu-li">
                                <?=
                                    $this->Html->link(__('Register'), [
                                        'controller' => 'Users',
                                        'action' => 'register'
                                    ],[
                                        'class' => 'nav-user-menu__anchor'
                                    ])
                                ?>
                            </li>
                            <li class="menu-li">
                            <?=
                                $this->Html->link(__('Log In'), [
                                    'controller' => 'Users',
                                    'action' => 'login'
                                ],[
                                    'class' => 'nav-user-menu__anchor'
                                ])
                            ?>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  

<nav class="top-bar">
    <div class="wrap text-white">
        <?php if($loggedIn): ?>
            <?= $this->Html->link('API Keys', '#'); ?>
            &nbsp;&nbsp;
            <?= $this->Html->link('Steam', '#'); ?>
            &nbsp;&nbsp;
            <?= $this->Html->link('Hearthstone', '#'); ?>
            &nbsp;&nbsp;
            <?= $this->Html->link('EVE', '#'); ?>
        <?php else: ?>
            <?= $this->Html->link(__('Log In'), [
            'controller' => 'Users',
            'action' => 'login'
            ]); ?>
        <?php endif; ?>
    </div>
</nav>