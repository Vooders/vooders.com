<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MumbleBan Entity
 *
 * @property int $server_id
 * @property string|resource $base
 * @property int $mask
 * @property string $name
 * @property string $hash
 * @property string $reason
 * @property \Cake\I18n\Time $start
 * @property int $duration
 *
 * @property \App\Model\Entity\MumbleServer $mumble_server
 */
class MumbleBan extends Entity
{

}
