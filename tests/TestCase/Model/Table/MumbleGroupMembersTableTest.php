<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MumbleGroupMembersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MumbleGroupMembersTable Test Case
 */
class MumbleGroupMembersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MumbleGroupMembersTable
     */
    public $MumbleGroupMembers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.mumble_group_members',
        'app.mumble_groups',
        'app.groups',
        'app.mumble_channels',
        'app.mumble_servers',
        'app.servers',
        'app.channels',
        'app.mumble_users',
        'app.users',
        'app.user_contacts',
        'app.user_emails',
        'app.battle_tags',
        'app.hots_logs',
        'app.steam_ids'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MumbleGroupMembers') ? [] : ['className' => 'App\Model\Table\MumbleGroupMembersTable'];
        $this->MumbleGroupMembers = TableRegistry::get('MumbleGroupMembers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MumbleGroupMembers);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test defaultConnectionName method
     *
     * @return void
     */
    public function testDefaultConnectionName()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
