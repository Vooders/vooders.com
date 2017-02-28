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

<div class="col-lg-6">
    <div class="well bs-component">
        <?= $this->Form->create($user, [
            'class' => 'form-horizontal'
        ]) ?>
            <fieldset>
                <legend>Register</legend>
                <div class="form-group">
                    <?= $this->Form->input('username', [
                        'class'=>'js-users form-control'
                    ]) ?>

                    <span class="info-span"></span>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('password', [
                        'class' => 'box1 form-control'
                    ]) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('confirmPassword', [
                        'type' => 'password',
                        'class' => 'box2 form-control',
                        'required' => true
                    ]) ?>
                </div>
                <div class="form-group">  
                    <?= $this->Form->input('email', [
                        'class' => 'form-control'
                    ]) ?>
                </div>  
            </fieldset>
            
            <?= $this->Form->button(__('Submit'), [
                'class' => 'btn btn-primary btn-lg'
            ])?>
        
        <?= $this->Form->end() ?>
    </div>
</div>
