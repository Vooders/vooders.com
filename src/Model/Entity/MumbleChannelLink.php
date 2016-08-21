<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MumbleChannelLink Entity
 *
 * @property int $server_id
 * @property int $channel_id
 * @property int $link_id
 *
 * @property \App\Model\Entity\MumbleChannel $mumble_channel
 * @property \App\Model\Entity\Link $link
 */
class MumbleChannelLink extends Entity
{

}
