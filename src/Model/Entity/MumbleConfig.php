<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MumbleConfig Entity
 *
 * @property int $server_id
 * @property string $key
 * @property string $value
 *
 * @property \App\Model\Entity\MumbleServer $mumble_server
 */
class MumbleConfig extends Entity
{

}
