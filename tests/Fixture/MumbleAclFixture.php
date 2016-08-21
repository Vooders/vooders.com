<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MumbleAclFixture
 *
 */
class MumbleAclFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'mumble_acl';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'server_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'channel_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'priority' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'group_name' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'apply_here' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'apply_sub' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'grantpriv' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'revokepriv' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'mumble_acl_user' => ['type' => 'index', 'columns' => ['server_id', 'user_id'], 'length' => []],
        ],
        '_constraints' => [
            'mumble_acl_channel_pri' => ['type' => 'unique', 'columns' => ['server_id', 'channel_id', 'priority'], 'length' => []],
            'mumble_acl_del_user' => ['type' => 'foreign', 'columns' => ['server_id', 'user_id'], 'references' => ['mumble_users', '1' => ['server_id', 'user_id']], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
            'mumble_acl_del_channel' => ['type' => 'foreign', 'columns' => ['server_id', 'channel_id'], 'references' => ['mumble_channels', '1' => ['server_id', 'channel_id']], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
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
            'priority' => 1,
            'user_id' => 1,
            'group_name' => 'Lorem ipsum dolor sit amet',
            'apply_here' => 1,
            'apply_sub' => 1,
            'grantpriv' => 1,
            'revokepriv' => 1
        ],
    ];
}
