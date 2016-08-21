<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MumbleUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MumbleUsersTable Test Case
 */
class MumbleUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MumbleUsersTable
     */
    public $MumbleUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.mumble_users',
        'app.mumble_servers',
        'app.servers',
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
        $config = TableRegistry::exists('MumbleUsers') ? [] : ['className' => 'App\Model\Table\MumbleUsersTable'];
        $this->MumbleUsers = TableRegistry::get('MumbleUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MumbleUsers);

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
