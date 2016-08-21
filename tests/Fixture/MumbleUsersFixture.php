<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MumbleUsersFixture
 *
 */
class MumbleUsersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'server_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'name' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'pw' => ['type' => 'string', 'length' => 128, 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'lastchannel' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'texture' => ['type' => 'binary', 'length' => 4294967295, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'last_active' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'mumble_users_channel' => ['type' => 'index', 'columns' => ['server_id', 'lastchannel'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['user_id'], 'length' => []],
            'mumble_users_id' => ['type' => 'unique', 'columns' => ['server_id', 'user_id'], 'length' => []],
            'mumble_users_name' => ['type' => 'unique', 'columns' => ['server_id', 'name'], 'length' => []],
            'mumble_users_server_del' => ['type' => 'foreign', 'columns' => ['server_id'], 'references' => ['mumble_servers', 'server_id'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
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
            'user_id' => 1,
            'name' => 'Lorem ipsum dolor sit amet',
            'pw' => 'Lorem ipsum dolor sit amet',
            'lastchannel' => 1,
            'texture' => 'Lorem ipsum dolor sit amet',
            'last_active' => 1471610105
        ],
    ];
}
