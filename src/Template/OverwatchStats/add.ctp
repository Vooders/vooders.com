<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Overwatch Stats'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Overwatch Characters'), ['controller' => 'OverwatchCharacters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Overwatch Character'), ['controller' => 'OverwatchCharacters', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="overwatchStats form large-9 medium-8 columns content">
    <?= $this->Form->create($overwatchStat) ?>
    <fieldset>
        <legend><?= __('Add Overwatch Stat') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('overwatch_character_id', ['options' => $overwatchCharacters]);
            echo $this->Form->input('melee_final_blows');
            echo $this->Form->input('solo_kills');
            echo $this->Form->input('objective_kills');
            echo $this->Form->input('final_blows');
            echo $this->Form->input('damage_done');
            echo $this->Form->input('eliminations');
            echo $this->Form->input('environmental_kills');
            echo $this->Form->input('multikills');
            echo $this->Form->input('healing_done');
            echo $this->Form->input('recon_assists');
            echo $this->Form->input('teleporter_pads_destroyed');
            echo $this->Form->input('eliminations_mostin_game');
            echo $this->Form->input('final_blows_mostin_game');
            echo $this->Form->input('damage_done_mostin_game');
            echo $this->Form->input('healing_done_mostin_game');
            echo $this->Form->input('defensive_assists_mostin_game');
            echo $this->Form->input('offensive_assists_mostin_game');
            echo $this->Form->input('objective_kills_mostin_game');
            echo $this->Form->input('objective_time_mostin_game');
            echo $this->Form->input('multikill_best');
            echo $this->Form->input('solo_kills_mostin_game');
            echo $this->Form->input('time_spenton_fire_mostin_game');
            echo $this->Form->input('melee_final_blows_average');
            echo $this->Form->input('final_blows_average');
            echo $this->Form->input('time_spenton_fire_average');
            echo $this->Form->input('solo_kills_average');
            echo $this->Form->input('objective_time_average');
            echo $this->Form->input('objective_kills_average');
            echo $this->Form->input('healing_done_average');
            echo $this->Form->input('deaths_average');
            echo $this->Form->input('damage_done_average');
            echo $this->Form->input('eliminations_average');
            echo $this->Form->input('deaths');
            echo $this->Form->input('environmental_deaths');
            echo $this->Form->input('cards');
            echo $this->Form->input('medals');
            echo $this->Form->input('medals_gold');
            echo $this->Form->input('medals_silver');
            echo $this->Form->input('medals_bronze');
            echo $this->Form->input('games_won');
            echo $this->Form->input('games_played');
            echo $this->Form->input('time_spenton_fire');
            echo $this->Form->input('objective_time');
            echo $this->Form->input('time_played');
            echo $this->Form->input('melee_final_blows_mostin_game');
            echo $this->Form->input('defensive_assists');
            echo $this->Form->input('defensive_assists_average');
            echo $this->Form->input('offensive_assists');
            echo $this->Form->input('offensive_assists_average');
            echo $this->Form->input('recon_assists_average');
            echo $this->Form->input('recon_assists_mostin_game');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
