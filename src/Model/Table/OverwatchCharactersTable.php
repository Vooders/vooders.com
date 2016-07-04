<?php
namespace App\Model\Table;

use App\Model\Entity\OverwatchCharacter;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OverwatchCharacters Model
 *
 * @property \Cake\ORM\Association\HasMany $OverwatchStats
 */
class OverwatchCharactersTable extends Table
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

        $this->table('overwatch_characters');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('OverwatchStats', [
            'foreignKey' => 'overwatch_character_id'
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
            ->requirePresence('display_name', 'create')
            ->notEmpty('display_name');

        $validator
            ->requirePresence('api_name', 'create')
            ->notEmpty('api_name');

        return $validator;
    }
}
