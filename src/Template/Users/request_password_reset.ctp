<div class="col-lg-6">
    <div class="well bs-component">
        <?= $this->Flash->render('auth') ?>
        
        <?= $this->Form->create(null ,[
            'class' => 'form-horizontal'
        ]) ?>   
            <fieldset>
                <legend>Request A Password reset</legend>
                <p><?= __('Enter your email address below and we\'ll send you a password reset link') ?></p>
                <div class="form-group">
                    <?= $this->Form->input('email', [
                        'label' => __('Email Address'),
                        'class' => 'form-control'
                    ]) ?>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Submit'),[
                'class' => 'btn btn-info btn-lg'
            ]); ?>
        <?= $this->Form->end() ?>
    </div>
</div>
