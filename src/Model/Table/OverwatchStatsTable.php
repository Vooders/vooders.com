<?php
namespace App\Model\Table;

use App\Model\Entity\OverwatchStat;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OverwatchStats Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $OverwatchCharacters
 */
class OverwatchStatsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('overwatch_stats');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('OverwatchCharacters', [
            'foreignKey' => 'overwatch_character_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('melee_final_blows')
            ->requirePresence('melee_final_blows', 'create')
            ->notEmpty('melee_final_blows');

        $validator
            ->integer('solo_kills')
            ->requirePresence('solo_kills', 'create')
            ->notEmpty('solo_kills');

        $validator
            ->integer('objective_kills')
            ->requirePresence('objective_kills', 'create')
            ->notEmpty('objective_kills');

        $validator
            ->integer('final_blows')
            ->requirePresence('final_blows', 'create')
            ->notEmpty('final_blows');

        $validator
            ->integer('damage_done')
            ->requirePresence('damage_done', 'create')
            ->notEmpty('damage_done');

        $validator
            ->integer('eliminations')
            ->requirePresence('eliminations', 'create')
            ->notEmpty('eliminations');

        $validator
            ->integer('environmental_kills')
            ->requirePresence('environmental_kills', 'create')
            ->notEmpty('environmental_kills');

        $validator
            ->integer('multikills')
            ->requirePresence('multikills', 'create')
            ->notEmpty('multikills');

        $validator
            ->integer('healing_done')
            ->requirePresence('healing_done', 'create')
            ->notEmpty('healing_done');

        $validator
            ->integer('recon_assists')
            ->requirePresence('recon_assists', 'create')
            ->notEmpty('recon_assists');

        $validator
            ->integer('teleporter_pads_destroyed')
            ->requirePresence('teleporter_pads_destroyed', 'create')
            ->notEmpty('teleporter_pads_destroyed');

        $validator
            ->integer('eliminations_mostin_game')
            ->requirePresence('eliminations_mostin_game', 'create')
            ->notEmpty('eliminations_mostin_game');

        $validator
            ->integer('final_blows_mostin_game')
            ->requirePresence('final_blows_mostin_game', 'create')
            ->notEmpty('final_blows_mostin_game');

        $validator
            ->integer('damage_done_mostin_game')
            ->requirePresence('damage_done_mostin_game', 'create')
            ->notEmpty('damage_done_mostin_game');

        $validator
            ->integer('healing_done_mostin_game')
            ->requirePresence('healing_done_mostin_game', 'create')
            ->notEmpty('healing_done_mostin_game');

        $validator
            ->integer('defensive_assists_mostin_game')
            ->requirePresence('defensive_assists_mostin_game', 'create')
            ->notEmpty('defensive_assists_mostin_game');

        $validator
            ->integer('offensive_assists_mostin_game')
            ->requirePresence('offensive_assists_mostin_game', 'create')
            ->notEmpty('offensive_assists_mostin_game');

        $validator
            ->integer('objective_kills_mostin_game')
            ->requirePresence('objective_kills_mostin_game', 'create')
            ->notEmpty('objective_kills_mostin_game');

        $validator
            ->requirePresence('objective_time_mostin_game', 'create')
            ->notEmpty('objective_time_mostin_game');

        $validator
            ->integer('multikill_best')
            ->requirePresence('multikill_best', 'create')
            ->notEmpty('multikill_best');

        $validator
            ->integer('solo_kills_mostin_game')
            ->requirePresence('solo_kills_mostin_game', 'create')
            ->notEmpty('solo_kills_mostin_game');

        $validator
            ->requirePresence('time_spenton_fire_mostin_game', 'create')
            ->notEmpty('time_spenton_fire_mostin_game');

        $validator
            ->numeric('melee_final_blows_average')
            ->requirePresence('melee_final_blows_average', 'create')
            ->notEmpty('melee_final_blows_average');

        $validator
            ->numeric('final_blows_average')
            ->requirePresence('final_blows_average', 'create')
            ->notEmpty('final_blows_average');

        $validator
            ->requirePresence('time_spenton_fire_average', 'create')
            ->notEmpty('time_spenton_fire_average');

        $validator
            ->numeric('solo_kills_average')
            ->requirePresence('solo_kills_average', 'create')
            ->notEmpty('solo_kills_average');

        $validator
            ->requirePresence('objective_time_average', 'create')
            ->notEmpty('objective_time_average');

        $validator
            ->numeric('objective_kills_average')
            ->requirePresence('objective_kills_average', 'create')
            ->notEmpty('objective_kills_average');

        $validator
            ->integer('healing_done_average')
            ->requirePresence('healing_done_average', 'create')
            ->notEmpty('healing_done_average');

        $validator
            ->numeric('deaths_average')
            ->requirePresence('deaths_average', 'create')
            ->notEmpty('deaths_average');

        $validator
            ->integer('damage_done_average')
            ->requirePresence('damage_done_average', 'create')
            ->notEmpty('damage_done_average');

        $validator
            ->numeric('eliminations_average')
            ->requirePresence('eliminations_average', 'create')
            ->notEmpty('eliminations_average');

        $validator
            ->integer('deaths')
            ->requirePresence('deaths', 'create')
            ->notEmpty('deaths');

        $validator
            ->integer('environmental_deaths')
            ->requirePresence('environmental_deaths', 'create')
            ->notEmpty('environmental_deaths');

        $validator
            ->integer('cards')
            ->requirePresence('cards', 'create')
            ->notEmpty('cards');

        $validator
            ->integer('medals')
            ->requirePresence('medals', 'create')
            ->notEmpty('medals');

        $validator
            ->integer('medals_gold')
            ->requirePresence('medals_gold', 'create')
            ->notEmpty('medals_gold');

        $validator
            ->integer('medals_silver')
            ->requirePresence('medals_silver', 'create')
            ->notEmpty('medals_silver');

        $validator
            ->integer('medals_bronze')
            ->requirePresence('medals_bronze', 'create')
            ->notEmpty('medals_bronze');

        $validator
            ->integer('games_won')
            ->requirePresence('games_won', 'create')
            ->notEmpty('games_won');

        $validator
            ->integer('games_played')
            ->requirePresence('games_played', 'create')
            ->notEmpty('games_played');

        $validator
            ->requirePresence('time_spenton_fire', 'create')
            ->notEmpty('time_spenton_fire');

        $validator
            ->requirePresence('objective_time', 'create')
            ->notEmpty('objective_time');

        $validator
            ->requirePresence('time_played', 'create')
            ->notEmpty('time_played');

        $validator
            ->integer('melee_final_blows_mostin_game')
            ->requirePresence('melee_final_blows_mostin_game', 'create')
            ->notEmpty('melee_final_blows_mostin_game');

        $validator
            ->integer('defensive_assists')
            ->requirePresence('defensive_assists', 'create')
            ->notEmpty('defensive_assists');

        $validator
            ->numeric('defensive_assists_average')
            ->requirePresence('defensive_assists_average', 'create')
            ->notEmpty('defensive_assists_average');

        $validator
            ->integer('offensive_assists')
            ->requirePresence('offensive_assists', 'create')
            ->notEmpty('offensive_assists');

        $validator
            ->numeric('offensive_assists_average')
            ->requirePresence('offensive_assists_average', 'create')
            ->notEmpty('offensive_assists_average');

        $validator
            ->integer('recon_assists_average')
            ->requirePresence('recon_assists_average', 'create')
            ->notEmpty('recon_assists_average');

        $validator
            ->integer('recon_assists_mostin_game')
            ->requirePresence('recon_assists_mostin_game', 'create')
            ->notEmpty('recon_assists_mostin_game');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['overwatch_character_id'], 'OverwatchCharacters'));
        return $rules;
    }
}
