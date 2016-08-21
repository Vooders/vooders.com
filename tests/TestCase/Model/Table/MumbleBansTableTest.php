<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MumbleBansTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MumbleBansTable Test Case
 */
class MumbleBansTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MumbleBansTable
     */
    public $MumbleBans;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.mumble_bans',
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
        $config = TableRegistry::exists('MumbleBans') ? [] : ['className' => 'App\Model\Table\MumbleBansTable'];
        $this->MumbleBans = TableRegistry::get('MumbleBans', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MumbleBans);

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
