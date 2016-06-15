<?php
$session = $this->request->session();
$loggedIn = false;
if ($session->read('User.id') > 0)
    $loggedIn = true;
?>
<div class="title-bar">
    <div class="title-bar-left">
        <span class="title-bar-title">Vooders.com</span>
    </div>
    <div class="title-bar-right">
        <button class="menu-icon" type="button" data-toggle="topMenu"></button>
        <div class="dropdown-pane bottom nav-user-menu" id="topMenu" data-dropdown data-auto-focus="true">
            <div class="row">  
                <div class="small-12 columns">  
                    <ul class="menu vertical right">
                        <li class="menu-text">
                            User Menu
                        </li>
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

<nav class="top-bar">
  <div class="top-bar-left">
    <ul class="menu small-12 columns" data-dropdown-menu>
      <li><?= $this->Html->link('Hearthstone', '#'); ?></li>
    </ul>
  </div>
 

  <ul class="dropdown menu">   
    
      
  </ul>
</nav>