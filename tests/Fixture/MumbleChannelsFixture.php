<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MumbleChannelsFixture
 *
 */
class MumbleChannelsFixture extends TestFixture
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
        'parent_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'name' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'inheritacl' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'mumble_channels_parent_del' => ['type' => 'index', 'columns' => ['server_id', 'parent_id'], 'length' => []],
        ],
        '_constraints' => [
            'mumble_channel_id' => ['type' => 'unique', 'columns' => ['server_id', 'channel_id'], 'length' => []],
            'mumble_channels_server_del' => ['type' => 'foreign', 'columns' => ['server_id'], 'references' => ['mumble_servers', 'server_id'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
            'mumble_channels_parent_del' => ['type' => 'foreign', 'columns' => ['server_id', 'parent_id'], 'references' => ['mumble_channels', '1' => ['server_id', 'channel_id']], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
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
            'parent_id' => 1,
            'name' => 'Lorem ipsum dolor sit amet',
            'inheritacl' => 1
        ],
    ];
}
