<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MumbleMeta Model
 *
 * @method \App\Model\Entity\MumbleMetum get($primaryKey, $options = [])
 * @method \App\Model\Entity\MumbleMetum newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MumbleMetum[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MumbleMetum|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MumbleMetum patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MumbleMetum[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MumbleMetum findOrCreate($search, callable $callback = null)
 */
class MumbleMetaTable extends Table
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

        $this->table('mumble_meta');
        $this->displayField('keystring');
        $this->primaryKey('keystring');
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
            ->allowEmpty('keystring', 'create');

        $validator
            ->allowEmpty('value');

        return $validator;
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
