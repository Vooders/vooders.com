<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
/**
 * User Entity.
 *
 * @property int $id
 * @property int $preferred_contact
 * @property string $name_first
 * @property string $name_middle
 * @property string $name_last
 * @property int $account_status
 * @property string $username
 * @property string $password
 * @property \Cake\I18n\Time $last_access
 * @property string|resource $avatar
 * @property string $biography
 * @property string $reset_hash
 * @property \Cake\I18n\Time $reset_time
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $created_by
 * @property int $modified_by
 * @property \App\Model\Entity\UserContact[] $user_contacts
 * @property \App\Model\Entity\UserEmail[] $user_emails
 */
class User extends Entity
{

	/**
	 * Fields that can be mass assigned using newEntity() or patchEntity().
	 *
	 * Note that when '*' is set to true, this allows all unspecified fields to
	 * be mass assigned. For security purposes, it is advised to set '*' to false
	 * (or remove it), and explicitly make individual fields accessible as needed.
	 *
	 * @var array
	 */
	protected $_accessible = [
		'*' => true,
		'id' => false,
	];
	
	public $validate = array(
    'username' => array(
      'required' => array(
        'rule' => 'notBlank',
        'message' => 'A username is required'
      )
    ),
    'password' => array(
      'required' => array(
          'rule' => 'notBlank',
          'message' => 'A password is required'
        )
    )
  );
		
	protected function _setPassword($value)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }
}
