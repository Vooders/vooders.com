<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OverwatchStat Entity.
 *
 * @property int $id
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 * @property int $overwatch_character_id
 * @property \App\Model\Entity\OverwatchCharacter $overwatch_character
 * @property int $melee_final_blows
 * @property int $solo_kills
 * @property int $objective_kills
 * @property int $final_blows
 * @property int $damage_done
 * @property int $eliminations
 * @property int $environmental_kills
 * @property int $multikills
 * @property int $healing_done
 * @property int $recon_assists
 * @property int $teleporter_pads_destroyed
 * @property int $eliminations_mostin_game
 * @property int $final_blows_mostin_game
 * @property int $damage_done_mostin_game
 * @property int $healing_done_mostin_game
 * @property int $defensive_assists_mostin_game
 * @property int $offensive_assists_mostin_game
 * @property int $objective_kills_mostin_game
 * @property string $objective_time_mostin_game
 * @property int $multikill_best
 * @property int $solo_kills_mostin_game
 * @property string $time_spenton_fire_mostin_game
 * @property float $melee_final_blows_average
 * @property float $final_blows_average
 * @property string $time_spenton_fire_average
 * @property float $solo_kills_average
 * @property string $objective_time_average
 * @property float $objective_kills_average
 * @property int $healing_done_average
 * @property float $deaths_average
 * @property int $damage_done_average
 * @property float $eliminations_average
 * @property int $deaths
 * @property int $environmental_deaths
 * @property int $cards
 * @property int $medals
 * @property int $medals_gold
 * @property int $medals_silver
 * @property int $medals_bronze
 * @property int $games_won
 * @property int $games_played
 * @property string $time_spenton_fire
 * @property string $objective_time
 * @property string $time_played
 * @property int $melee_final_blows_mostin_game
 * @property int $defensive_assists
 * @property float $defensive_assists_average
 * @property int $offensive_assists
 * @property float $offensive_assists_average
 * @property int $recon_assists_average
 * @property int $recon_assists_mostin_game
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class OverwatchStat extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
