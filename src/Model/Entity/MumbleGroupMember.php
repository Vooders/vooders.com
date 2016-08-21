<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MumbleGroupMember Entity
 *
 * @property int $group_id
 * @property int $server_id
 * @property int $user_id
 * @property int $addit
 *
 * @property \App\Model\Entity\MumbleGroup $mumble_group
 * @property \App\Model\Entity\MumbleUser $mumble_user
 */
class MumbleGroupMember extends Entity
{

}
