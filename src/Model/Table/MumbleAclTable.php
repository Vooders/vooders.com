<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MumbleAcl Model
 *
 * @property \Cake\ORM\Association\BelongsTo $MumbleUsers
 * @property \Cake\ORM\Association\BelongsTo $MumbleChannels
 * @property \Cake\ORM\Association\BelongsTo $MumbleUsers
 *
 * @method \App\Model\Entity\MumbleAcl get($primaryKey, $options = [])
 * @method \App\Model\Entity\MumbleAcl newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MumbleAcl[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MumbleAcl|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MumbleAcl patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MumbleAcl[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MumbleAcl findOrCreate($search, callable $callback = null)
 */
class MumbleAclTable extends Table
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

        $this->table('mumble_acl');

        $this->belongsTo('MumbleUsers', [
            'foreignKey' => 'server_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('MumbleChannels', [
            'foreignKey' => 'channel_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('MumbleUsers', [
            'foreignKey' => 'user_id'
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
            ->integer('priority')
            ->allowEmpty('priority');

        $validator
            ->allowEmpty('group_name');

        $validator
            ->integer('apply_here')
            ->allowEmpty('apply_here');

        $validator
            ->integer('apply_sub')
            ->allowEmpty('apply_sub');

        $validator
            ->integer('grantpriv')
            ->allowEmpty('grantpriv');

        $validator
            ->integer('revokepriv')
            ->allowEmpty('revokepriv');

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
        $rules->add($rules->existsIn(['channel_id'], 'MumbleChannels'));
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
