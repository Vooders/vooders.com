<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MumbleUserInfoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MumbleUserInfoTable Test Case
 */
class MumbleUserInfoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MumbleUserInfoTable
     */
    public $MumbleUserInfo;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.mumble_user_info',
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
        $config = TableRegistry::exists('MumbleUserInfo') ? [] : ['className' => 'App\Model\Table\MumbleUserInfoTable'];
        $this->MumbleUserInfo = TableRegistry::get('MumbleUserInfo', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MumbleUserInfo);

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
