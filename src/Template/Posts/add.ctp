<link href="//cdn.quilljs.com/1.2.2/quill.snow.css" rel="stylesheet">
<link href="//cdn.quilljs.com/1.2.2/quill.bubble.css" rel="stylesheet">
<link href="//cdn.quilljs.com/1.2.2/quill.core.css" rel="stylesheet">
<script src="//cdn.quilljs.com/1.2.2/quill.min.js"></script>

<div class="row">
<span class="testing"></span>
    <div class="well bs-component ">
        <?= $this->Form->create($post, [
            'class' => 'form-horizontal'
        ]) ?>
        <div class="form-group">
            <?= $this->Form->input('title', [
                'label' => 'Post Title',
                'class' => 'form-control'
            ]) ?>
        </div>
        
        <?= $this->Form->input('body', [
            'class' => 'output',
            'type' => 'hidden'
        ]) ?>

        <?= $this->Form->input('delta', [
            'class' => 'delta-output',
            'type' => 'hidden'
        ]) ?>

        <label for="editor">Post Content</label>
        <div id="editor">
            <p>Hello World!</p>
            <p>Some initial <strong>bold</strong> text</p>
            <p><br></p>
        </div>

        <script>
            var quill = new Quill('#editor', {
                theme: 'snow'
            });

            $('#editor').on("keyup mouseenter mouseleave", function(){
                var delta = quill.getContents();
                console.log(delta.toSource());
                $('.output').val(quill.root.innerHTML);
                $('.delta-output').val(delta.toSource());
                $('.testing').text(quill.root.innerHTML);
            });
        </script>
        <?= $this->Form->button(__('Submit'), [
            'class' => 'btn btn-primary btn-lg marg-top'
        ]) ?>
    <?= $this->Form->end() ?>
    </div>
    
</div>

