<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Overwatch Stat'), ['action' => 'edit', $overwatchStat->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Overwatch Stat'), ['action' => 'delete', $overwatchStat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $overwatchStat->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Overwatch Stats'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Overwatch Stat'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Overwatch Characters'), ['controller' => 'OverwatchCharacters', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Overwatch Character'), ['controller' => 'OverwatchCharacters', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="overwatchStats view large-9 medium-8 columns content">
    <h3><?= h($overwatchStat->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $overwatchStat->has('user') ? $this->Html->link($overwatchStat->user->id, ['controller' => 'Users', 'action' => 'view', $overwatchStat->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Overwatch Character') ?></th>
            <td><?= $overwatchStat->has('overwatch_character') ? $this->Html->link($overwatchStat->overwatch_character->id, ['controller' => 'OverwatchCharacters', 'action' => 'view', $overwatchStat->overwatch_character->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Objective Time Mostin Game') ?></th>
            <td><?= h($overwatchStat->objective_time_mostin_game) ?></td>
        </tr>
        <tr>
            <th><?= __('Time Spenton Fire Mostin Game') ?></th>
            <td><?= h($overwatchStat->time_spenton_fire_mostin_game) ?></td>
        </tr>
        <tr>
            <th><?= __('Time Spenton Fire Average') ?></th>
            <td><?= h($overwatchStat->time_spenton_fire_average) ?></td>
        </tr>
        <tr>
            <th><?= __('Objective Time Average') ?></th>
            <td><?= h($overwatchStat->objective_time_average) ?></td>
        </tr>
        <tr>
            <th><?= __('Time Spenton Fire') ?></th>
            <td><?= h($overwatchStat->time_spenton_fire) ?></td>
        </tr>
        <tr>
            <th><?= __('Objective Time') ?></th>
            <td><?= h($overwatchStat->objective_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Time Played') ?></th>
            <td><?= h($overwatchStat->time_played) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($overwatchStat->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Melee Final Blows') ?></th>
            <td><?= $this->Number->format($overwatchStat->melee_final_blows) ?></td>
        </tr>
        <tr>
            <th><?= __('Solo Kills') ?></th>
            <td><?= $this->Number->format($overwatchStat->solo_kills) ?></td>
        </tr>
        <tr>
            <th><?= __('Objective Kills') ?></th>
            <td><?= $this->Number->format($overwatchStat->objective_kills) ?></td>
        </tr>
        <tr>
            <th><?= __('Final Blows') ?></th>
            <td><?= $this->Number->format($overwatchStat->final_blows) ?></td>
        </tr>
        <tr>
            <th><?= __('Damage Done') ?></th>
            <td><?= $this->Number->format($overwatchStat->damage_done) ?></td>
        </tr>
        <tr>
            <th><?= __('Eliminations') ?></th>
            <td><?= $this->Number->format($overwatchStat->eliminations) ?></td>
        </tr>
        <tr>
            <th><?= __('Environmental Kills') ?></th>
            <td><?= $this->Number->format($overwatchStat->environmental_kills) ?></td>
        </tr>
        <tr>
            <th><?= __('Multikills') ?></th>
            <td><?= $this->Number->format($overwatchStat->multikills) ?></td>
        </tr>
        <tr>
            <th><?= __('Healing Done') ?></th>
            <td><?= $this->Number->format($overwatchStat->healing_done) ?></td>
        </tr>
        <tr>
            <th><?= __('Recon Assists') ?></th>
            <td><?= $this->Number->format($overwatchStat->recon_assists) ?></td>
        </tr>
        <tr>
            <th><?= __('Teleporter Pads Destroyed') ?></th>
            <td><?= $this->Number->format($overwatchStat->teleporter_pads_destroyed) ?></td>
        </tr>
        <tr>
            <th><?= __('Eliminations Mostin Game') ?></th>
            <td><?= $this->Number->format($overwatchStat->eliminations_mostin_game) ?></td>
        </tr>
        <tr>
            <th><?= __('Final Blows Mostin Game') ?></th>
            <td><?= $this->Number->format($overwatchStat->final_blows_mostin_game) ?></td>
        </tr>
        <tr>
            <th><?= __('Damage Done Mostin Game') ?></th>
            <td><?= $this->Number->format($overwatchStat->damage_done_mostin_game) ?></td>
        </tr>
        <tr>
            <th><?= __('Healing Done Mostin Game') ?></th>
            <td><?= $this->Number->format($overwatchStat->healing_done_mostin_game) ?></td>
        </tr>
        <tr>
            <th><?= __('Defensive Assists Mostin Game') ?></th>
            <td><?= $this->Number->format($overwatchStat->defensive_assists_mostin_game) ?></td>
        </tr>
        <tr>
            <th><?= __('Offensive Assists Mostin Game') ?></th>
            <td><?= $this->Number->format($overwatchStat->offensive_assists_mostin_game) ?></td>
        </tr>
        <tr>
            <th><?= __('Objective Kills Mostin Game') ?></th>
            <td><?= $this->Number->format($overwatchStat->objective_kills_mostin_game) ?></td>
        </tr>
        <tr>
            <th><?= __('Multikill Best') ?></th>
            <td><?= $this->Number->format($overwatchStat->multikill_best) ?></td>
        </tr>
        <tr>
            <th><?= __('Solo Kills Mostin Game') ?></th>
            <td><?= $this->Number->format($overwatchStat->solo_kills_mostin_game) ?></td>
        </tr>
        <tr>
            <th><?= __('Melee Final Blows Average') ?></th>
            <td><?= $this->Number->format($overwatchStat->melee_final_blows_average) ?></td>
        </tr>
        <tr>
            <th><?= __('Final Blows Average') ?></th>
            <td><?= $this->Number->format($overwatchStat->final_blows_average) ?></td>
        </tr>
        <tr>
            <th><?= __('Solo Kills Average') ?></th>
            <td><?= $this->Number->format($overwatchStat->solo_kills_average) ?></td>
        </tr>
        <tr>
            <th><?= __('Objective Kills Average') ?></th>
            <td><?= $this->Number->format($overwatchStat->objective_kills_average) ?></td>
        </tr>
        <tr>
            <th><?= __('Healing Done Average') ?></th>
            <td><?= $this->Number->format($overwatchStat->healing_done_average) ?></td>
        </tr>
        <tr>
            <th><?= __('Deaths Average') ?></th>
            <td><?= $this->Number->format($overwatchStat->deaths_average) ?></td>
        </tr>
        <tr>
            <th><?= __('Damage Done Average') ?></th>
            <td><?= $this->Number->format($overwatchStat->damage_done_average) ?></td>
        </tr>
        <tr>
            <th><?= __('Eliminations Average') ?></th>
            <td><?= $this->Number->format($overwatchStat->eliminations_average) ?></td>
        </tr>
        <tr>
            <th><?= __('Deaths') ?></th>
            <td><?= $this->Number->format($overwatchStat->deaths) ?></td>
        </tr>
        <tr>
            <th><?= __('Environmental Deaths') ?></th>
            <td><?= $this->Number->format($overwatchStat->environmental_deaths) ?></td>
        </tr>
        <tr>
            <th><?= __('Cards') ?></th>
            <td><?= $this->Number->format($overwatchStat->cards) ?></td>
        </tr>
        <tr>
            <th><?= __('Medals') ?></th>
            <td><?= $this->Number->format($overwatchStat->medals) ?></td>
        </tr>
        <tr>
            <th><?= __('Medals Gold') ?></th>
            <td><?= $this->Number->format($overwatchStat->medals_gold) ?></td>
        </tr>
        <tr>
            <th><?= __('Medals Silver') ?></th>
            <td><?= $this->Number->format($overwatchStat->medals_silver) ?></td>
        </tr>
        <tr>
            <th><?= __('Medals Bronze') ?></th>
            <td><?= $this->Number->format($overwatchStat->medals_bronze) ?></td>
        </tr>
        <tr>
            <th><?= __('Games Won') ?></th>
            <td><?= $this->Number->format($overwatchStat->games_won) ?></td>
        </tr>
        <tr>
            <th><?= __('Games Played') ?></th>
            <td><?= $this->Number->format($overwatchStat->games_played) ?></td>
        </tr>
        <tr>
            <th><?= __('Melee Final Blows Mostin Game') ?></th>
            <td><?= $this->Number->format($overwatchStat->melee_final_blows_mostin_game) ?></td>
        </tr>
        <tr>
            <th><?= __('Defensive Assists') ?></th>
            <td><?= $this->Number->format($overwatchStat->defensive_assists) ?></td>
        </tr>
        <tr>
            <th><?= __('Defensive Assists Average') ?></th>
            <td><?= $this->Number->format($overwatchStat->defensive_assists_average) ?></td>
        </tr>
        <tr>
            <th><?= __('Offensive Assists') ?></th>
            <td><?= $this->Number->format($overwatchStat->offensive_assists) ?></td>
        </tr>
        <tr>
            <th><?= __('Offensive Assists Average') ?></th>
            <td><?= $this->Number->format($overwatchStat->offensive_assists_average) ?></td>
        </tr>
        <tr>
            <th><?= __('Recon Assists Average') ?></th>
            <td><?= $this->Number->format($overwatchStat->recon_assists_average) ?></td>
        </tr>
        <tr>
            <th><?= __('Recon Assists Mostin Game') ?></th>
            <td><?= $this->Number->format($overwatchStat->recon_assists_mostin_game) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($overwatchStat->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($overwatchStat->modified) ?></td>
        </tr>
    </table>
</div>
