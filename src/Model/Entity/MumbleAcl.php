<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MumbleAcl Entity
 *
 * @property int $server_id
 * @property int $channel_id
 * @property int $priority
 * @property int $user_id
 * @property string $group_name
 * @property int $apply_here
 * @property int $apply_sub
 * @property int $grantpriv
 * @property int $revokepriv
 *
 * @property \App\Model\Entity\MumbleUser $mumble_user
 * @property \App\Model\Entity\MumbleChannel $mumble_channel
 */
class MumbleAcl extends Entity
{

}
