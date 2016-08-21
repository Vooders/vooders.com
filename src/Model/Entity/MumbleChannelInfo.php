<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MumbleChannelInfo Entity
 *
 * @property int $server_id
 * @property int $channel_id
 * @property int $key
 * @property string $value
 *
 * @property \App\Model\Entity\MumbleChannel $mumble_channel
 */
class MumbleChannelInfo extends Entity
{

}
