<div class="well">
    <div class="row">
        <div class="col-lg-9">
            <h3 class="marg-top--tiny marg-bottom"><?= __('Posts') ?></h3>
        </div>
        <div class="col-lg-3 text-right">
            <a href="#" class="btn btn-default btn-lg btn-block">New Post</a>
        </div>
    </div>
    
    <div class="list-group">

        <?php foreach($posts as $post): ?>
            <a href="#" class="list-group-item">
                <h6 class="list-group-item-heading"><?= $post->title ?></h6>
                <h6 class="list-group-item-text"><small><?= $post->created ?></small></h6>
            </a>
        <?php endforeach; ?>
    </div>
    
    <div class="paginator text-center">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
