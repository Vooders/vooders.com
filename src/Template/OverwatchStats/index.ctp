<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Overwatch Stat'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Overwatch Characters'), ['controller' => 'OverwatchCharacters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Overwatch Character'), ['controller' => 'OverwatchCharacters', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="overwatchStats index large-9 medium-8 columns content">
    <h3><?= __('Overwatch Stats') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('overwatch_character_id') ?></th>
                <th><?= $this->Paginator->sort('melee_final_blows') ?></th>
                <th><?= $this->Paginator->sort('solo_kills') ?></th>
                <th><?= $this->Paginator->sort('objective_kills') ?></th>
                <th><?= $this->Paginator->sort('final_blows') ?></th>
                <th><?= $this->Paginator->sort('damage_done') ?></th>
                <th><?= $this->Paginator->sort('eliminations') ?></th>
                <th><?= $this->Paginator->sort('environmental_kills') ?></th>
                <th><?= $this->Paginator->sort('multikills') ?></th>
                <th><?= $this->Paginator->sort('healing_done') ?></th>
                <th><?= $this->Paginator->sort('recon_assists') ?></th>
                <th><?= $this->Paginator->sort('teleporter_pads_destroyed') ?></th>
                <th><?= $this->Paginator->sort('eliminations_mostin_game') ?></th>
                <th><?= $this->Paginator->sort('final_blows_mostin_game') ?></th>
                <th><?= $this->Paginator->sort('damage_done_mostin_game') ?></th>
                <th><?= $this->Paginator->sort('healing_done_mostin_game') ?></th>
                <th><?= $this->Paginator->sort('defensive_assists_mostin_game') ?></th>
                <th><?= $this->Paginator->sort('offensive_assists_mostin_game') ?></th>
                <th><?= $this->Paginator->sort('objective_kills_mostin_game') ?></th>
                <th><?= $this->Paginator->sort('objective_time_mostin_game') ?></th>
                <th><?= $this->Paginator->sort('multikill_best') ?></th>
                <th><?= $this->Paginator->sort('solo_kills_mostin_game') ?></th>
                <th><?= $this->Paginator->sort('time_spenton_fire_mostin_game') ?></th>
                <th><?= $this->Paginator->sort('melee_final_blows_average') ?></th>
                <th><?= $this->Paginator->sort('final_blows_average') ?></th>
                <th><?= $this->Paginator->sort('time_spenton_fire_average') ?></th>
                <th><?= $this->Paginator->sort('solo_kills_average') ?></th>
                <th><?= $this->Paginator->sort('objective_time_average') ?></th>
                <th><?= $this->Paginator->sort('objective_kills_average') ?></th>
                <th><?= $this->Paginator->sort('healing_done_average') ?></th>
                <th><?= $this->Paginator->sort('deaths_average') ?></th>
                <th><?= $this->Paginator->sort('damage_done_average') ?></th>
                <th><?= $this->Paginator->sort('eliminations_average') ?></th>
                <th><?= $this->Paginator->sort('deaths') ?></th>
                <th><?= $this->Paginator->sort('environmental_deaths') ?></th>
                <th><?= $this->Paginator->sort('cards') ?></th>
                <th><?= $this->Paginator->sort('medals') ?></th>
                <th><?= $this->Paginator->sort('medals_gold') ?></th>
                <th><?= $this->Paginator->sort('medals_silver') ?></th>
                <th><?= $this->Paginator->sort('medals_bronze') ?></th>
                <th><?= $this->Paginator->sort('games_won') ?></th>
                <th><?= $this->Paginator->sort('games_played') ?></th>
                <th><?= $this->Paginator->sort('time_spenton_fire') ?></th>
                <th><?= $this->Paginator->sort('objective_time') ?></th>
                <th><?= $this->Paginator->sort('time_played') ?></th>
                <th><?= $this->Paginator->sort('melee_final_blows_mostin_game') ?></th>
                <th><?= $this->Paginator->sort('defensive_assists') ?></th>
                <th><?= $this->Paginator->sort('defensive_assists_average') ?></th>
                <th><?= $this->Paginator->sort('offensive_assists') ?></th>
                <th><?= $this->Paginator->sort('offensive_assists_average') ?></th>
                <th><?= $this->Paginator->sort('recon_assists_average') ?></th>
                <th><?= $this->Paginator->sort('recon_assists_mostin_game') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($overwatchStats as $overwatchStat): ?>
            <tr>
                <td><?= $this->Number->format($overwatchStat->id) ?></td>
                <td><?= $overwatchStat->has('user') ? $this->Html->link($overwatchStat->user->id, ['controller' => 'Users', 'action' => 'view', $overwatchStat->user->id]) : '' ?></td>
                <td><?= $overwatchStat->has('overwatch_character') ? $this->Html->link($overwatchStat->overwatch_character->id, ['controller' => 'OverwatchCharacters', 'action' => 'view', $overwatchStat->overwatch_character->id]) : '' ?></td>
                <td><?= $this->Number->format($overwatchStat->melee_final_blows) ?></td>
                <td><?= $this->Number->format($overwatchStat->solo_kills) ?></td>
                <td><?= $this->Number->format($overwatchStat->objective_kills) ?></td>
                <td><?= $this->Number->format($overwatchStat->final_blows) ?></td>
                <td><?= $this->Number->format($overwatchStat->damage_done) ?></td>
                <td><?= $this->Number->format($overwatchStat->eliminations) ?></td>
                <td><?= $this->Number->format($overwatchStat->environmental_kills) ?></td>
                <td><?= $this->Number->format($overwatchStat->multikills) ?></td>
                <td><?= $this->Number->format($overwatchStat->healing_done) ?></td>
                <td><?= $this->Number->format($overwatchStat->recon_assists) ?></td>
                <td><?= $this->Number->format($overwatchStat->teleporter_pads_destroyed) ?></td>
                <td><?= $this->Number->format($overwatchStat->eliminations_mostin_game) ?></td>
                <td><?= $this->Number->format($overwatchStat->final_blows_mostin_game) ?></td>
                <td><?= $this->Number->format($overwatchStat->damage_done_mostin_game) ?></td>
                <td><?= $this->Number->format($overwatchStat->healing_done_mostin_game) ?></td>
                <td><?= $this->Number->format($overwatchStat->defensive_assists_mostin_game) ?></td>
                <td><?= $this->Number->format($overwatchStat->offensive_assists_mostin_game) ?></td>
                <td><?= $this->Number->format($overwatchStat->objective_kills_mostin_game) ?></td>
                <td><?= h($overwatchStat->objective_time_mostin_game) ?></td>
                <td><?= $this->Number->format($overwatchStat->multikill_best) ?></td>
                <td><?= $this->Number->format($overwatchStat->solo_kills_mostin_game) ?></td>
                <td><?= h($overwatchStat->time_spenton_fire_mostin_game) ?></td>
                <td><?= $this->Number->format($overwatchStat->melee_final_blows_average) ?></td>
                <td><?= $this->Number->format($overwatchStat->final_blows_average) ?></td>
                <td><?= h($overwatchStat->time_spenton_fire_average) ?></td>
                <td><?= $this->Number->format($overwatchStat->solo_kills_average) ?></td>
                <td><?= h($overwatchStat->objective_time_average) ?></td>
                <td><?= $this->Number->format($overwatchStat->objective_kills_average) ?></td>
                <td><?= $this->Number->format($overwatchStat->healing_done_average) ?></td>
                <td><?= $this->Number->format($overwatchStat->deaths_average) ?></td>
                <td><?= $this->Number->format($overwatchStat->damage_done_average) ?></td>
                <td><?= $this->Number->format($overwatchStat->eliminations_average) ?></td>
                <td><?= $this->Number->format($overwatchStat->deaths) ?></td>
                <td><?= $this->Number->format($overwatchStat->environmental_deaths) ?></td>
                <td><?= $this->Number->format($overwatchStat->cards) ?></td>
                <td><?= $this->Number->format($overwatchStat->medals) ?></td>
                <td><?= $this->Number->format($overwatchStat->medals_gold) ?></td>
                <td><?= $this->Number->format($overwatchStat->medals_silver) ?></td>
                <td><?= $this->Number->format($overwatchStat->medals_bronze) ?></td>
                <td><?= $this->Number->format($overwatchStat->games_won) ?></td>
                <td><?= $this->Number->format($overwatchStat->games_played) ?></td>
                <td><?= h($overwatchStat->time_spenton_fire) ?></td>
                <td><?= h($overwatchStat->objective_time) ?></td>
                <td><?= h($overwatchStat->time_played) ?></td>
                <td><?= $this->Number->format($overwatchStat->melee_final_blows_mostin_game) ?></td>
                <td><?= $this->Number->format($overwatchStat->defensive_assists) ?></td>
                <td><?= $this->Number->format($overwatchStat->defensive_assists_average) ?></td>
                <td><?= $this->Number->format($overwatchStat->offensive_assists) ?></td>
                <td><?= $this->Number->format($overwatchStat->offensive_assists_average) ?></td>
                <td><?= $this->Number->format($overwatchStat->recon_assists_average) ?></td>
                <td><?= $this->Number->format($overwatchStat->recon_assists_mostin_game) ?></td>
                <td><?= h($overwatchStat->created) ?></td>
                <td><?= h($overwatchStat->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $overwatchStat->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $overwatchStat->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $overwatchStat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $overwatchStat->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
