<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MumbleBans Model
 *
 * @property \Cake\ORM\Association\BelongsTo $MumbleServers
 *
 * @method \App\Model\Entity\MumbleBan get($primaryKey, $options = [])
 * @method \App\Model\Entity\MumbleBan newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MumbleBan[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MumbleBan|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MumbleBan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MumbleBan[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MumbleBan findOrCreate($search, callable $callback = null)
 */
class MumbleBansTable extends Table
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

        $this->table('mumble_bans');
        $this->displayField('name');

        $this->belongsTo('MumbleServers', [
            'foreignKey' => 'server_id',
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
            ->allowEmpty('base');

        $validator
            ->integer('mask')
            ->allowEmpty('mask');

        $validator
            ->allowEmpty('name');

        $validator
            ->allowEmpty('hash');

        $validator
            ->allowEmpty('reason');

        $validator
            ->dateTime('start')
            ->allowEmpty('start');

        $validator
            ->integer('duration')
            ->allowEmpty('duration');

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
        $rules->add($rules->existsIn(['server_id'], 'MumbleServers'));

        return $rules;
    }

    /**
     * Returns the database connection name to use by default.
     *
     * @return string
     */
    public static function defaultConnectionName()
    {
        return 'mumble';
    }
}
