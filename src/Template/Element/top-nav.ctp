<?php
$session = $this->request->session();
$loggedIn = false;
if ($session->read('User.id') > 0)
  $loggedIn = true;
  ?>
<nav class="top-bar">
  <div class="top-bar-left">
    <ul class="menu" data-dropdown-menu>
      <a href="/">
        <li class="menu-text">VOODERS.COM</li>
      </a>
    </ul>
  </div>
  <div class="top-bar-right">
     <ul class="menu" data-dropdown-menu>
      <?php if($loggedIn) : ?> 
      <li>
      <?=
        $this->Html->link(__('My Profile'), [
          'controller' => 'Users',
          'action' => 'profile' 
        ],[
          'class' => 'primary-nav__anchor'
        ])
      ?>
      </li>
      <li>
        <?= 
          $this->Html->link(__('Log Out'), [
            'controller' => 'Users',
            'action' => 'logout'
          ],[
          'class' => 'primary-nav__anchor'
        ]) 
        ?>
      </li>
      
    <?php else: ?>
       <li>
        <?= 
          $this->Html->link(__('Register'), [
            'controller' => 'Users',
            'action' => 'register'
          ],[
          'class' => 'primary-nav__anchor'
        ]) 
        ?>
      </li>
      <li><?= 
        $this->Html->link(__('Log In'), [
          'controller' => 'Users',
          'action' => 'login'
        ],[
          'class' => 'primary-nav__anchor'
        ]) 
      ?></li>
      <?php endif; ?>
    </ul>
  </div>
 

  <ul class="dropdown menu">   
    
      
  </ul>
</nav>