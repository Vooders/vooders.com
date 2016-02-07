<div class="wrap">
  <div class="push-col1 col10 center-text">
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>
    <fieldset>
      <h3><?= __('Forgotten Username') ?></h3>
      <p><?= __('Enter your email address and password below and we\'ll send your username to you') ?></p>
      <?= $this->Form->input('email', ['label' => __('Email Address')]) ?>
      <?= $this->Form->input('password', ['label' => __('Password')]) ?>
      <?= $this->Form->input('pin', ['label' => __('PIN')]) ?>
    </fieldset>
    <?= $this->Form->button(__('Login')); ?>
    <?= $this->Form->end() ?>
  </div>
</div>
