<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MumbleAclTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MumbleAclTable Test Case
 */
class MumbleAclTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MumbleAclTable
     */
    public $MumbleAcl;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.mumble_acl',
        'app.mumble_users',
        'app.mumble_servers',
        'app.servers',
        'app.users',
        'app.user_contacts',
        'app.user_emails',
        'app.battle_tags',
        'app.hots_logs',
        'app.steam_ids',
        'app.mumble_channels'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MumbleAcl') ? [] : ['className' => 'App\Model\Table\MumbleAclTable'];
        $this->MumbleAcl = TableRegistry::get('MumbleAcl', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MumbleAcl);

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
