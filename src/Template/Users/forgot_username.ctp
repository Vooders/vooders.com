<div class="col-lg-6">
    <div class="well bs-component">
        <?= $this->Flash->render('auth') ?>
        <?= $this->Form->create(null ,[
            'class' => 'form-horizontal'
        ]) ?>
            <fieldset>
            <legend><?= __('Forgotten Username') ?></legend>
            <p><?= __('Enter your email address and password below and we\'ll send your username to you') ?></p>

            <div class="form-group">
                <?= $this->Form->input('email', [
                    'label' => __('Email Address'),
                    'class' => 'form-control'
                ]) ?>
            </div>
            <div class="form-group">
                <?= $this->Form->input('password', [
                    'label' => __('Password'),
                    'class' => 'form-control'
                ]) ?>

            </div>
            </fieldset>
            <?= $this->Form->button(__('Login'),[
                'class' => 'btn btn-info btn-lg'
            ]) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
