
<div class="col-lg-6">
    <div class="well bs-component">
        <?= $this->Flash->render('auth') ?>
        <?= $this->Form->create(null ,[
            'class' => 'form-horizontal'
        ]) ?>
        
        <div class="col-sml-12">
            <fieldset>
                <legend>Log In</legend>
                <div class="form-group">
                    <?= $this->Form->input('username', [
                        'class' => 'js-login form-control'
                    ]) ?>
                    <span class="info-span"></span>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('password', [
                        'class' => 'form-control'
                    ]) ?>
                </div>    
            </fieldset>
         
            <?= $this->Form->button(__('Login'),[
                'class' => 'btn btn-primary btn-lg'
            ]) ?>
        </div>
        <div class="col-sml-12 pad-top--small">
            <a href="/register" class="btn btn-default btn-sm">Register</a>
            <a href="/forgot-password" class="btn btn-default btn-sm">Forgot Password?</a>
            <a href="/forgot-username" class="btn btn-default btn-sm">Forgot Username?</a>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>


