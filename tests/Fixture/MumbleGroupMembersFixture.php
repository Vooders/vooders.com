<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MumbleGroupMembersFixture
 *
 */
class MumbleGroupMembersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'group_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'server_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'addit' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'mumble_group_members_users' => ['type' => 'index', 'columns' => ['server_id', 'user_id'], 'length' => []],
            'mumble_group_members_del_group' => ['type' => 'index', 'columns' => ['group_id'], 'length' => []],
        ],
        '_constraints' => [
            'mumble_group_members_del_user' => ['type' => 'foreign', 'columns' => ['server_id', 'user_id'], 'references' => ['mumble_users', '1' => ['server_id', 'user_id']], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
            'mumble_group_members_del_group' => ['type' => 'foreign', 'columns' => ['group_id'], 'references' => ['mumble_groups', 'group_id'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
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
            'group_id' => 1,
            'server_id' => 1,
            'user_id' => 1,
            'addit' => 1
        ],
    ];
}
