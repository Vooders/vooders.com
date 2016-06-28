<?php
/**
 * 
 */
//debug($user);die;
$battleTags = $user->battle_tags;
$steamIds = $user->steam_ids;
?>
<div class="row api-hero">
    <div class="wrap">
        <div class="small-12 columns">
            <h1 class="exo text-white ">API Keys</h1>
            <p class="exo text-white bold">Connect vooders.com with the games you play</p>
        </div>
    </div>
</div>
<div class="wrap">
    <?php /**-- BattleTags --**/ ?>
    <div class="row pad-top--large">
        <div class="small-12 medium-4 columns">
            <h2>BattleTags</h2>
            <p>Add BattleTags to get HotsLogs data</p>
        </div>
        <div class="small-12 medium-5 columns">
            <div class="rel-box">
                <div class="sit-bottom">
                    <?php if($battleTags): ?>
                        <?php foreach($battleTags as $tag): ?>
                            <p class="exo bigger"><?= $tag->tag ?></p>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>You have not added a BattleTag</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="small-12 medium-3 columns text-right">
            <div class="rel-box">
                <div class="sit-bottom right">
                    <p>
                        <span class="link black exo js-reveal" data-class="new-tag">ADD NEW</span>
                        &nbsp;&nbsp;|&nbsp;&nbsp;
                        <span class="link black exo js-reveal" data-class="more-info">MORE INFO</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="small-12">
            <hr class="marg--none"/>
        </div>
    </div>
    <div class="row">
        <div class="small-12 medium-9 columns pad-top">
            <div class="more-info" style="display: none">
                <h4>More Info</h4>
                <?php if($battleTags): ?>
                    <?php if($battleTags): ?>
                        <?php foreach($battleTags as $tag): ?>
                            <p>Tag:&nbsp;<?= $tag->tag ?>&nbsp;&nbsp;Added:&nbsp;<?= $tag->created ?></p>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>You have not added a BattleTag</p>
                    <?php endif; ?>
                <?php else: ?>
                    <p>You have not added a BattleTag</p>
                <?php endif; ?>
            </div>
        </div>
        <div class="small-12 medium-3 columns pad-top">
            <div class="new-tag" style="display: none">
                <h4>Add a BattleTag</h4>
                <?=
                $this->Form->create(null,[
                    'url' => [
                        'controller' => 'BattleTags',
                        'action' => 'add'
                    ]
                ])
                ?>
                <?= $this->Form->input('tag', ['label' => 'BattleTag']) ?>

                <?= $this->Form->radio('Region', [
                    ['value' => 'EU', 'text' => 'Europe', 'checked' => true],
                    ['value' => 'AM', 'text' => 'Americas'],
                    ['value' => 'AS', 'text' => 'Asia'],
                    ['value' => 'CH', 'text' => 'China']
                ]) ?>

                <?= $this->Form->submit('Add BattleTag', ['class'  => 'button']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>


    <?php /**-- Steam IDs --**/ ?>
    <div class="row pad-top--large">
        <div class="small-12 medium-4 columns">
            <h2>Steam IDs</h2>
            <p>Add a Steam ID to get data from your account</p>
        </div>
        <div class="small-12 medium-5 columns">
            <div class="rel-box">
                <div class="sit-bottom">
                    <?php if($steamIds): ?>
                        <p></p>
                    <?php else: ?>
                        <p>You have not added a Steam ID</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="small-12 medium-3 columns text-right">
            <div class="rel-box">
                <div class="sit-bottom right">
                    <p>
                        <span class="link black exo">ADD NEW</span>
                        &nbsp;&nbsp;|&nbsp;&nbsp;
                        <span class="link black exo">MORE INFO</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="small-12">
            <hr class="marg--none"/>
        </div>
    </div>
    <div class="row">
        <div class="small-12 columns">
            <p>More Steam ID stuff</p>
        </div>
    </div>
</div>
