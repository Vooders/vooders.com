<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;

/**
 * MumbleUsers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $MumbleServers
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\MumbleUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\MumbleUser newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MumbleUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MumbleUser|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MumbleUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MumbleUser[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MumbleUser findOrCreate($search, callable $callback = null)
 */
class MumbleUsersTable extends Table
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
        $this->table('mumble.mumble_users');

        $this->displayField('name');
        $this->primaryKey('user_id');

        $this->belongsTo('MumbleServers', [
            'foreignKey' => 'server_id',
            'joinType' => 'INNER'
        ]);
      //  $this->hasOne('Users');
        $this->hasMany('MumbleGroups', [
            'foreignKey' => 'user_id',
            'joinTable' => 'mumble_group_members'
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
            ->allowEmpty('name');

        $validator
            ->allowEmpty('pw');

        $validator
            ->integer('lastchannel')
            ->allowEmpty('lastchannel');

        $validator
            ->allowEmpty('texture');

        $validator
            ->dateTime('last_active')
            ->requirePresence('last_active', 'create')
            ->notEmpty('last_active');

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
      //  $rules->add($rules->existsIn(['server_id'], 'MumbleServers'));
        //$rules->add($rules->existsIn(['user_id'], 'Users'));

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
