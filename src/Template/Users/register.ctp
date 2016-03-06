<?php
/**
 * Application: Markets Meet
 *
 * Version: 0.1.1
 *
 * Framework: CakePHP 3.1.*
 *
 * File: Template / Users / Register
 *
 * Description:
 *
 * 1, Enable users to register for an account on Markets Meet
 *
**/
?>

<section style="padding: 20px 80px; max-width: 600px;">
  <h2>Register</h2>
  <?php
    echo $this->Form->create($user);
    
    echo $this->Form->input('username', [
      'class'=>'js-users', 'border'
    ]);
    
    echo '<span class="info-span"></span>';
    
    echo $this->Form->input('password', [
      'class' => 'box1'
    ]);
    
    echo $this->Form->input('confirmPassword', [
      'type' => 'password',
      'class' => 'box2',
      'required' => true
    ]);
    
    echo $this->Form->input('email');
    
    echo $this->Form->button(__('Submit'), [
        'class' => 'large button'
      ]);
    
    echo $this->Form->end();
  ?>
</section>
