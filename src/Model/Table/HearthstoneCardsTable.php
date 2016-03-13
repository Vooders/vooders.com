<?php
namespace App\Model\Table;

use App\Model\Entity\HearthstoneCard;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HearthstoneCards Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Cards
 */
class HearthstoneCardsTable extends Table
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

        $this->table('hearthstone_cards');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsToMany('HearthstoneDecks', [
            'joinTable' => 'hearthstone_decks_cards',
            'foreignKey' => 'hearthstone_card_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->allowEmpty('card_set');

        $validator
            ->allowEmpty('type');

        $validator
            ->allowEmpty('faction');

        $validator
            ->allowEmpty('rarity');

        $validator
            ->integer('cost')
            ->allowEmpty('cost');

        $validator
            ->integer('attack')
            ->allowEmpty('attack');

        $validator
            ->integer('health')
            ->allowEmpty('health');

        $validator
            ->allowEmpty('text');

        $validator
            ->allowEmpty('elite');

        $validator
            ->allowEmpty('img');

        $validator
            ->allowEmpty('img_gold');

        $validator
            ->boolean('collectible')
            ->allowEmpty('collectible');

        $validator
            ->allowEmpty('player_class');

        $validator
            ->requirePresence('locale', 'create')
            ->notEmpty('locale');

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
        return $rules;
    }
}
