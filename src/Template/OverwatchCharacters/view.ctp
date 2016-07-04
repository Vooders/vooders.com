<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Overwatch Character'), ['action' => 'edit', $overwatchCharacter->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Overwatch Character'), ['action' => 'delete', $overwatchCharacter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $overwatchCharacter->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Overwatch Characters'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Overwatch Character'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Overwatch Stats'), ['controller' => 'OverwatchStats', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Overwatch Stat'), ['controller' => 'OverwatchStats', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="overwatchCharacters view large-9 medium-8 columns content">
    <h3><?= h($overwatchCharacter->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Display Name') ?></th>
            <td><?= h($overwatchCharacter->display_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Api Name') ?></th>
            <td><?= h($overwatchCharacter->api_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($overwatchCharacter->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($overwatchCharacter->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($overwatchCharacter->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Overwatch Stats') ?></h4>
        <?php if (!empty($overwatchCharacter->overwatch_stats)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Overwatch Character Id') ?></th>
                <th><?= __('Melee Final Blows') ?></th>
                <th><?= __('Solo Kills') ?></th>
                <th><?= __('Objective Kills') ?></th>
                <th><?= __('Final Blows') ?></th>
                <th><?= __('Damage Done') ?></th>
                <th><?= __('Eliminations') ?></th>
                <th><?= __('Environmental Kills') ?></th>
                <th><?= __('Multikills') ?></th>
                <th><?= __('Healing Done') ?></th>
                <th><?= __('Recon Assists') ?></th>
                <th><?= __('Teleporter Pads Destroyed') ?></th>
                <th><?= __('Eliminations Mostin Game') ?></th>
                <th><?= __('Final Blows Mostin Game') ?></th>
                <th><?= __('Damage Done Mostin Game') ?></th>
                <th><?= __('Healing Done Mostin Game') ?></th>
                <th><?= __('Defensive Assists Mostin Game') ?></th>
                <th><?= __('Offensive Assists Mostin Game') ?></th>
                <th><?= __('Objective Kills Mostin Game') ?></th>
                <th><?= __('Objective Time Mostin Game') ?></th>
                <th><?= __('Multikill Best') ?></th>
                <th><?= __('Solo Kills Mostin Game') ?></th>
                <th><?= __('Time Spenton Fire Mostin Game') ?></th>
                <th><?= __('Melee Final Blows Average') ?></th>
                <th><?= __('Final Blows Average') ?></th>
                <th><?= __('Time Spenton Fire Average') ?></th>
                <th><?= __('Solo Kills Average') ?></th>
                <th><?= __('Objective Time Average') ?></th>
                <th><?= __('Objective Kills Average') ?></th>
                <th><?= __('Healing Done Average') ?></th>
                <th><?= __('Deaths Average') ?></th>
                <th><?= __('Damage Done Average') ?></th>
                <th><?= __('Eliminations Average') ?></th>
                <th><?= __('Deaths') ?></th>
                <th><?= __('Environmental Deaths') ?></th>
                <th><?= __('Cards') ?></th>
                <th><?= __('Medals') ?></th>
                <th><?= __('Medals Gold') ?></th>
                <th><?= __('Medals Silver') ?></th>
                <th><?= __('Medals Bronze') ?></th>
                <th><?= __('Games Won') ?></th>
                <th><?= __('Games Played') ?></th>
                <th><?= __('Time Spenton Fire') ?></th>
                <th><?= __('Objective Time') ?></th>
                <th><?= __('Time Played') ?></th>
                <th><?= __('Melee Final Blows Mostin Game') ?></th>
                <th><?= __('Defensive Assists') ?></th>
                <th><?= __('Defensive Assists Average') ?></th>
                <th><?= __('Offensive Assists') ?></th>
                <th><?= __('Offensive Assists Average') ?></th>
                <th><?= __('Recon Assists Average') ?></th>
                <th><?= __('Recon Assists Mostin Game') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($overwatchCharacter->overwatch_stats as $overwatchStats): ?>
            <tr>
                <td><?= h($overwatchStats->id) ?></td>
                <td><?= h($overwatchStats->user_id) ?></td>
                <td><?= h($overwatchStats->overwatch_character_id) ?></td>
                <td><?= h($overwatchStats->melee_final_blows) ?></td>
                <td><?= h($overwatchStats->solo_kills) ?></td>
                <td><?= h($overwatchStats->objective_kills) ?></td>
                <td><?= h($overwatchStats->final_blows) ?></td>
                <td><?= h($overwatchStats->damage_done) ?></td>
                <td><?= h($overwatchStats->eliminations) ?></td>
                <td><?= h($overwatchStats->environmental_kills) ?></td>
                <td><?= h($overwatchStats->multikills) ?></td>
                <td><?= h($overwatchStats->healing_done) ?></td>
                <td><?= h($overwatchStats->recon_assists) ?></td>
                <td><?= h($overwatchStats->teleporter_pads_destroyed) ?></td>
                <td><?= h($overwatchStats->eliminations_mostin_game) ?></td>
                <td><?= h($overwatchStats->final_blows_mostin_game) ?></td>
                <td><?= h($overwatchStats->damage_done_mostin_game) ?></td>
                <td><?= h($overwatchStats->healing_done_mostin_game) ?></td>
                <td><?= h($overwatchStats->defensive_assists_mostin_game) ?></td>
                <td><?= h($overwatchStats->offensive_assists_mostin_game) ?></td>
                <td><?= h($overwatchStats->objective_kills_mostin_game) ?></td>
                <td><?= h($overwatchStats->objective_time_mostin_game) ?></td>
                <td><?= h($overwatchStats->multikill_best) ?></td>
                <td><?= h($overwatchStats->solo_kills_mostin_game) ?></td>
                <td><?= h($overwatchStats->time_spenton_fire_mostin_game) ?></td>
                <td><?= h($overwatchStats->melee_final_blows_average) ?></td>
                <td><?= h($overwatchStats->final_blows_average) ?></td>
                <td><?= h($overwatchStats->time_spenton_fire_average) ?></td>
                <td><?= h($overwatchStats->solo_kills_average) ?></td>
                <td><?= h($overwatchStats->objective_time_average) ?></td>
                <td><?= h($overwatchStats->objective_kills_average) ?></td>
                <td><?= h($overwatchStats->healing_done_average) ?></td>
                <td><?= h($overwatchStats->deaths_average) ?></td>
                <td><?= h($overwatchStats->damage_done_average) ?></td>
                <td><?= h($overwatchStats->eliminations_average) ?></td>
                <td><?= h($overwatchStats->deaths) ?></td>
                <td><?= h($overwatchStats->environmental_deaths) ?></td>
                <td><?= h($overwatchStats->cards) ?></td>
                <td><?= h($overwatchStats->medals) ?></td>
                <td><?= h($overwatchStats->medals_gold) ?></td>
                <td><?= h($overwatchStats->medals_silver) ?></td>
                <td><?= h($overwatchStats->medals_bronze) ?></td>
                <td><?= h($overwatchStats->games_won) ?></td>
                <td><?= h($overwatchStats->games_played) ?></td>
                <td><?= h($overwatchStats->time_spenton_fire) ?></td>
                <td><?= h($overwatchStats->objective_time) ?></td>
                <td><?= h($overwatchStats->time_played) ?></td>
                <td><?= h($overwatchStats->melee_final_blows_mostin_game) ?></td>
                <td><?= h($overwatchStats->defensive_assists) ?></td>
                <td><?= h($overwatchStats->defensive_assists_average) ?></td>
                <td><?= h($overwatchStats->offensive_assists) ?></td>
                <td><?= h($overwatchStats->offensive_assists_average) ?></td>
                <td><?= h($overwatchStats->recon_assists_average) ?></td>
                <td><?= h($overwatchStats->recon_assists_mostin_game) ?></td>
                <td><?= h($overwatchStats->created) ?></td>
                <td><?= h($overwatchStats->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OverwatchStats', 'action' => 'view', $overwatchStats->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'OverwatchStats', 'action' => 'edit', $overwatchStats->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OverwatchStats', 'action' => 'delete', $overwatchStats->id], ['confirm' => __('Are you sure you want to delete # {0}?', $overwatchStats->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
