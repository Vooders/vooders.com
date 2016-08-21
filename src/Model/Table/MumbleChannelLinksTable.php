<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MumbleChannelLinks Model
 *
 * @property \Cake\ORM\Association\BelongsTo $MumbleChannels
 * @property \Cake\ORM\Association\BelongsTo $MumbleChannels
 * @property \Cake\ORM\Association\BelongsTo $Links
 *
 * @method \App\Model\Entity\MumbleChannelLink get($primaryKey, $options = [])
 * @method \App\Model\Entity\MumbleChannelLink newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MumbleChannelLink[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MumbleChannelLink|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MumbleChannelLink patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MumbleChannelLink[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MumbleChannelLink findOrCreate($search, callable $callback = null)
 */
class MumbleChannelLinksTable extends Table
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

        $this->table('mumble_channel_links');

        $this->belongsTo('MumbleChannels', [
            'foreignKey' => 'server_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('MumbleChannels', [
            'foreignKey' => 'channel_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Links', [
            'foreignKey' => 'link_id',
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
        $rules->add($rules->existsIn(['server_id'], 'MumbleChannels'));
        $rules->add($rules->existsIn(['channel_id'], 'MumbleChannels'));
        $rules->add($rules->existsIn(['link_id'], 'Links'));

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
