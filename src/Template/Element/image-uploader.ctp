<div class="pad-top">
    <!-- Add the logo -->
    <?= $this->Form->create(null, [
        'url'=>'Images/add',
        'type'=>'file',
        'class'=>'js-upload-form js-profile-pic-upload'
    ]) ?>
    <div class="clear upload-form pad bg-dark">
        <div class="js-upload__drop upload-form__drop">
            Drag files here or<br /><a>Browse</a>
            <?= $this->Form->input('parent_type', [
                'type'=>'hidden',
                'value'=>$imgType
            ]) ?>
            <?= $this->Form->input('file', [
                'type'=>'file',
                'multiple'=>false,
                'label'=>false
            ]) ?>

        </div>
        <ul class="uploader-display"></ul>
    </div>
    <?= $this->Form->end() ?>
</div>