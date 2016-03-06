<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\HasMany $UserContacts
 * @property \Cake\ORM\Association\HasMany $UserEmails
 */
class UsersTable extends Table
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

      $this->table('users');
      $this->displayField('id');
      $this->primaryKey('id');

      $this->addBehavior('Timestamp');

      $this->hasMany('UserContacts', [
          'foreignKey' => 'user_id'
      ]);
      $this->hasMany('UserEmails', [
          'foreignKey' => 'user_id'
      ]);
      $this->hasOne('BattleTags', [
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
          ->add('id', 'valid', ['rule' => 'numeric'])
          ->allowEmpty('id', 'create');

      $validator
          ->add('preferred_contact', 'valid', ['rule' => 'numeric'])
          ->allowEmpty('preferred_contact');

      $validator
          ->add('account_status', 'valid', ['rule' => 'numeric'])
          ->requirePresence('account_status', 'create')
          ->notEmpty('account_status');

      $validator
          ->requirePresence('username', 'create')
          ->notEmpty('username');

      $validator
          ->requirePresence('password', 'create')
          ->notEmpty('password');

      $validator
          ->add('last_access', 'valid', ['rule' => 'datetime'])
          ->allowEmpty('last_access');

      $validator
          ->allowEmpty('reset_hash');

      $validator
          ->add('reset_time', 'valid', ['rule' => 'datetime'])
          ->allowEmpty('reset_time');

      $validator
          ->add('created_by', 'valid', ['rule' => 'numeric'])
          ->allowEmpty('created_by');

      $validator
          ->add('modified_by', 'valid', ['rule' => 'numeric'])
          ->allowEmpty('modified_by');

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
        $rules->add($rules->isUnique(['username']));
        return $rules;
    }
}
