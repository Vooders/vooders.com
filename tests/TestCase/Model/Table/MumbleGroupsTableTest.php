<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MumbleGroupsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MumbleGroupsTable Test Case
 */
class MumbleGroupsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MumbleGroupsTable
     */
    public $MumbleGroups;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.mumble_groups',
        'app.groups',
        'app.mumble_channels',
        'app.mumble_servers',
        'app.servers',
        'app.channels'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MumbleGroups') ? [] : ['className' => 'App\Model\Table\MumbleGroupsTable'];
        $this->MumbleGroups = TableRegistry::get('MumbleGroups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MumbleGroups);

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
