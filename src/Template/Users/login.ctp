<div class="wrap">
  <div class="push-col1 col10 center-text">
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>
    <fieldset>
      <h3>Log In</h3>
      <?= $this->Form->input('username', [
        'class' => 'js-login'
      ]) ?>
      <span class="info-span"></span>
      <br/>
      <?= $this->Form->input('password') ?>
    </fieldset>
    <?= $this->Form->button(__('Login')); ?>
    <?= $this->Form->end() ?>
    <?= $this->Html->link('Register', [
      'controller' => 'users',
      'action' => 'register'
    ]) ?>
    <br/>
    <?= $this->Html->link('Forgot Password?', [
      'controller' => 'users',
      'action' => 'requestPasswordReset'
    ]) ?>
    <br/>
    <?= $this->Html->link('Forgot Username?', [
      'controller' => 'users',
      'action' => 'forgotUsername'
    ]) ?>
  </div>
</div>
