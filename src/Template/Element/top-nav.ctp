<?php
$session = $this->request->session();
$loggedIn = false;
if ($session->read('User.id') > 0)
  $loggedIn = true;
  ?>
<nav class="primary-nav">
  <ul class="">
    <li class="primary-nav__item">
      <h1>VOODERS.COM</h1>
    </li>
  </ul>
  <ul class="primary-nav_group right">   
    <?php if($loggedIn) : ?> 
      <li class="primary-nav__item">
      <?=
        $this->Html->link(__('My Profile'), [
          'controller' => 'Users',
          'action' => 'profile' , $session->read('User.id')
        ],[
          'class' => 'primary-nav__anchor'
        ])
      ?>
      </li>
      <li class="primary-nav__item">
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
       <li class="primary-nav__item">
        <?= 
          $this->Html->link(__('Register'), [
            'controller' => 'Users',
            'action' => 'register'
          ],[
          'class' => 'primary-nav__anchor'
        ]) 
        ?>
      </li>
      <li class="primary-nav__item">
      <?= 
        $this->Html->link(__('Log In'), [
          'controller' => 'Users',
          'action' => 'login'
        ],[
          'class' => 'primary-nav__anchor'
        ]) 
      ?>
    </li>
      <?php endif; ?>
      
  </ul>
</nav>