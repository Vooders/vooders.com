<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MumbleUser Entity
 *
 * @property int $server_id
 * @property int $user_id
 * @property string $name
 * @property string $pw
 * @property int $lastchannel
 * @property string|resource $texture
 * @property \Cake\I18n\Time $last_active
 *
 * @property \App\Model\Entity\MumbleServer $mumble_server
 * @property \App\Model\Entity\User $user
 */
class MumbleUser extends Entity
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
        'user_id' => false
    ];
}
