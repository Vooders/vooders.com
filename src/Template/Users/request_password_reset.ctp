<div class="small-12 large-6 columns">
  <div class="">
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
    <?= $this->Form->button(__('Submit'), ['class' => 'button']); ?>
    <?= $this->Form->end() ?>
  </div>
</div>
