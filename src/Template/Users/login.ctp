<div class="wrap">
    <div class="small-12 columns">
        <div class="">
        <?= phpinfo() ?>
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
        </div>
        <div class="row">
            <?= $this->Form->button(__('Login'),[
                'class' => 'large button'
            ]); ?>
            <?= $this->Form->end() ?>


        </div>
        <div class="row">
            <?= $this->Html->link('Register', [
                'controller' => 'users',
                'action' => 'register'
            ], [
                'class' => 'tiny button'
            ]) ?>
            <?= $this->Html->link('Forgot Password?', [
                'controller' => 'users',
                'action' => 'requestPasswordReset'
            ], [
                'class' => 'tiny button'
            ]) ?>
            <br/>
            <?= $this->Html->link('Forgot Username?', [
                'controller' => 'users',
                'action' => 'forgotUsername'
            ], [
                'class' => 'tiny button'
            ]) ?>
        </div>
    </div>
</div>

