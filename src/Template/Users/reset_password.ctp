<div class="wrap">
  <div class="push-col1 col10 center-text">
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>
    <fieldset>
      <?= $this->Form->input('password', [
        'label' => __('Password'),
        'class' => 'box1'
      ]) ?>
      <br/>
      <?= $this->Form->input('confirm', [
        'label' => __('Confirm'),
        'type' => 'password',
        'class' => 'box2'
      ]) ?>
    </fieldset>
    <?= $this->Form->button(__('Login'), [
      'disabled' => true,
      'class' => 'submitButton'
    ]); ?>
    <?= $this->Form->end() ?>
  </div>
</div>

