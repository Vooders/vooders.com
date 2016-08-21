<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MumbleGroupMembers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $MumbleGroups
 * @property \Cake\ORM\Association\BelongsTo $MumbleUsers
 * @property \Cake\ORM\Association\BelongsTo $MumbleUsers
 *
 * @method \App\Model\Entity\MumbleGroupMember get($primaryKey, $options = [])
 * @method \App\Model\Entity\MumbleGroupMember newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MumbleGroupMember[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MumbleGroupMember|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MumbleGroupMember patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MumbleGroupMember[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MumbleGroupMember findOrCreate($search, callable $callback = null)
 */
class MumbleGroupMembersTable extends Table
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

        $this->table('mumble_group_members');

        $this->belongsTo('MumbleGroups', [
            'foreignKey' => 'group_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('MumbleUsers', [
            'foreignKey' => 'server_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('MumbleUsers', [
            'foreignKey' => 'user_id',
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
            ->integer('addit')
            ->allowEmpty('addit');

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
        $rules->add($rules->existsIn(['group_id'], 'MumbleGroups'));
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
