<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MumbleServersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MumbleServersTable Test Case
 */
class MumbleServersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MumbleServersTable
     */
    public $MumbleServers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.mumble_servers',
        'app.servers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MumbleServers') ? [] : ['className' => 'App\Model\Table\MumbleServersTable'];
        $this->MumbleServers = TableRegistry::get('MumbleServers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MumbleServers);

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
