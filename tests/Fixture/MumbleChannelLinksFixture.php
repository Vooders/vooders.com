<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MumbleChannelLinksFixture
 *
 */
class MumbleChannelLinksFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'server_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'channel_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'link_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'mumble_channel_links_del_channel' => ['type' => 'index', 'columns' => ['server_id', 'channel_id'], 'length' => []],
        ],
        '_constraints' => [
            'mumble_channel_links_del_channel' => ['type' => 'foreign', 'columns' => ['server_id', 'channel_id'], 'references' => ['mumble_channels', '1' => ['server_id', 'channel_id']], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_bin'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'server_id' => 1,
            'channel_id' => 1,
            'link_id' => 1
        ],
    ];
}
