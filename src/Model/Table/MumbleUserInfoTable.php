<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MumbleUserInfo Model
 *
 * @property \Cake\ORM\Association\BelongsTo $MumbleUsers
 * @property \Cake\ORM\Association\BelongsTo $MumbleUsers
 *
 * @method \App\Model\Entity\MumbleUserInfo get($primaryKey, $options = [])
 * @method \App\Model\Entity\MumbleUserInfo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MumbleUserInfo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MumbleUserInfo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MumbleUserInfo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MumbleUserInfo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MumbleUserInfo findOrCreate($search, callable $callback = null)
 */
class MumbleUserInfoTable extends Table
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

        $this->table('mumble_user_info');

        $this->belongsTo('MumbleUsers', [
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
            ->integer('key')
            ->allowEmpty('key');

        $validator
            ->allowEmpty('value');

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
        $rules->add($rules->existsIn(['server_id'], 'MumbleUsers'));
        $rules->add($rules->existsIn(['user_id'], 'MumbleUsers'));

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
