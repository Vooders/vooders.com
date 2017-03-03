<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PostCategories Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Posts
 *
 * @method \App\Model\Entity\PostCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\PostCategory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PostCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PostCategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PostCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PostCategory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PostCategory findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PostCategoriesTable extends Table
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

        $this->table('post_categories');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Posts', [
            'foreignKey' => 'post_category_id',
            'targetForeignKey' => 'post_id',
            'joinTable' => 'posts_post_categories'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('name')
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        return $validator;
    }
}
