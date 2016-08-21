<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MumbleSlog Entity
 *
 * @property int $server_id
 * @property string $msg
 * @property \Cake\I18n\Time $msgtime
 *
 * @property \App\Model\Entity\MumbleServer $mumble_server
 */
class MumbleSlog extends Entity
{

}
