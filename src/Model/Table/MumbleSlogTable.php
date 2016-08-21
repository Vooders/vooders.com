<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MumbleSlog Model
 *
 * @property \Cake\ORM\Association\BelongsTo $MumbleServers
 *
 * @method \App\Model\Entity\MumbleSlog get($primaryKey, $options = [])
 * @method \App\Model\Entity\MumbleSlog newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MumbleSlog[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MumbleSlog|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MumbleSlog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MumbleSlog[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MumbleSlog findOrCreate($search, callable $callback = null)
 */
class MumbleSlogTable extends Table
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

        $this->table('mumble_slog');

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
            ->allowEmpty('msg');

        $validator
            ->dateTime('msgtime')
            ->requirePresence('msgtime', 'create')
            ->notEmpty('msgtime');

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
