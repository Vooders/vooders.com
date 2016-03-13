<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * HearthstoneCard Entity.
 *
 * @property int $id
 * @property string $card_id
 * @property string $name
 * @property string $card_set
 * @property string $type
 * @property string $faction
 * @property string $rarity
 * @property int $cost
 * @property int $attack
 * @property int $health
 * @property string $text
 * @property string $elite
 * @property string $img
 * @property string $img_gold
 * @property bool $collectible
 * @property string $player_class
 * @property string $locale
 */
class HearthstoneCard extends Entity
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
        'id' => false,
    ];
}
