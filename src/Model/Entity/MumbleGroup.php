<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MumbleGroup Entity
 *
 * @property int $group_id
 * @property int $server_id
 * @property string $name
 * @property int $channel_id
 * @property int $inherit
 * @property int $inheritable
 *
 * @property \App\Model\Entity\Group $group
 * @property \App\Model\Entity\MumbleChannel $mumble_channel
 */
class MumbleGroup extends Entity
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
        'group_id' => false
    ];
}
