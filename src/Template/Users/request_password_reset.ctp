<div class="wrap">
  <div class="push-col1 col10 center-text">
    <h2>Request A Password reset</h2>
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>   
    <fieldset>
      <legend>
      <?= __('Please enter your email to reset your password') ?>
    </legend>
      <?= $this->Form->input('email', [
        'label' => __('Email Address')
      ]) ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')); ?>
    <?= $this->Form->end() ?>
  </div>
</div>
