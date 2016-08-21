<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MumbleUserInfo Entity
 *
 * @property int $server_id
 * @property int $user_id
 * @property int $key
 * @property string $value
 *
 * @property \App\Model\Entity\MumbleUser $mumble_user
 */
class MumbleUserInfo extends Entity
{

}
