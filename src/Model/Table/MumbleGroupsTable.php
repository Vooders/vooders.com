<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MumbleGroups Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Groups
 * @property \Cake\ORM\Association\BelongsTo $MumbleChannels
 * @property \Cake\ORM\Association\BelongsTo $MumbleChannels
 *
 * @method \App\Model\Entity\MumbleGroup get($primaryKey, $options = [])
 * @method \App\Model\Entity\MumbleGroup newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MumbleGroup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MumbleGroup|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MumbleGroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MumbleGroup[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MumbleGroup findOrCreate($search, callable $callback = null)
 */
class MumbleGroupsTable extends Table
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

        $this->table('mumble_groups');
        $this->displayField('name');
        $this->primaryKey('group_id');

        $this->belongsTo('Groups', [
            'foreignKey' => 'group_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('MumbleChannels', [
            'foreignKey' => 'server_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('MumbleChannels', [
            'foreignKey' => 'channel_id',
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
            ->allowEmpty('name');

        $validator
            ->integer('inherit')
            ->allowEmpty('inherit');

        $validator
            ->integer('inheritable')
            ->allowEmpty('inheritable');

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
        $rules->add($rules->existsIn(['group_id'], 'Groups'));
        $rules->add($rules->existsIn(['server_id'], 'MumbleChannels'));
        $rules->add($rules->existsIn(['channel_id'], 'MumbleChannels'));

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
