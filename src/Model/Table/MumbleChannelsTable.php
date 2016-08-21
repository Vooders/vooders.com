<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MumbleChannels Model
 *
 * @property \Cake\ORM\Association\BelongsTo $MumbleServers
 * @property \Cake\ORM\Association\BelongsTo $Channels
 * @property \Cake\ORM\Association\BelongsTo $ParentMumbleChannels
 * @property \Cake\ORM\Association\HasMany $ChildMumbleChannels
 *
 * @method \App\Model\Entity\MumbleChannel get($primaryKey, $options = [])
 * @method \App\Model\Entity\MumbleChannel newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MumbleChannel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MumbleChannel|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MumbleChannel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MumbleChannel[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MumbleChannel findOrCreate($search, callable $callback = null)
 */
class MumbleChannelsTable extends Table
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

        $this->table('mumble_channels');
        $this->displayField('name');

        $this->belongsTo('MumbleServers', [
            'foreignKey' => 'server_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Channels', [
            'foreignKey' => 'channel_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ParentMumbleChannels', [
            'className' => 'MumbleChannels',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildMumbleChannels', [
            'className' => 'MumbleChannels',
            'foreignKey' => 'parent_id'
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
            ->integer('inheritacl')
            ->allowEmpty('inheritacl');

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
        $rules->add($rules->existsIn(['channel_id'], 'Channels'));
        $rules->add($rules->existsIn(['parent_id'], 'ParentMumbleChannels'));

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
