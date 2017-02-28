<div class="col-lg-6">
    <div class="well bs-component">
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create(null ,[
            'class' => 'form-horizontal'
        ]) ?>
        <fieldset>
            <legend>Reset Password</legend>
            <div class="form-group">
                <?= $this->Form->input('password', [
                    'label' => __('Password'),
                    'class' => 'box1 form-control'
                ]) ?>
            </div>
            <div class="form-group">
                <?= $this->Form->input('confirm', [
                    'label' => __('Confirm'),
                    'type' => 'password',
                    'class' => 'box2 form-control'
                ]) ?>
            </div>
        </fieldset>
        <?= $this->Form->button(__('Login'), [
            'disabled' => true,
            'class' => 'submitButton btn btn-primary btn-lg'
        ]); ?>
    <?= $this->Form->end() ?>
    </div>
</div>

