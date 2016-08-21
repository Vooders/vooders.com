<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MumbleServers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Servers
 *
 * @method \App\Model\Entity\MumbleServer get($primaryKey, $options = [])
 * @method \App\Model\Entity\MumbleServer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MumbleServer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MumbleServer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MumbleServer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MumbleServer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MumbleServer findOrCreate($search, callable $callback = null)
 */
class MumbleServersTable extends Table
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

        $this->table('mumble_servers');
        $this->displayField('server_id');
        $this->primaryKey('server_id');

        $this->belongsTo('Servers', [
            'foreignKey' => 'server_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['server_id'], 'Servers'));

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
