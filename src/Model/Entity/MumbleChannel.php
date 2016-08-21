<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MumbleChannel Entity
 *
 * @property int $server_id
 * @property int $channel_id
 * @property int $parent_id
 * @property string $name
 * @property int $inheritacl
 *
 * @property \App\Model\Entity\MumbleServer $mumble_server
 * @property \App\Model\Entity\Channel $channel
 * @property \App\Model\Entity\ParentMumbleChannel $parent_mumble_channel
 * @property \App\Model\Entity\ChildMumbleChannel[] $child_mumble_channels
 */
class MumbleChannel extends Entity
{

}
