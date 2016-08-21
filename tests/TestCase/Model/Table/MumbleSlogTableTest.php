<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MumbleSlogTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MumbleSlogTable Test Case
 */
class MumbleSlogTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MumbleSlogTable
     */
    public $MumbleSlog;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.mumble_slog',
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
        $config = TableRegistry::exists('MumbleSlog') ? [] : ['className' => 'App\Model\Table\MumbleSlogTable'];
        $this->MumbleSlog = TableRegistry::get('MumbleSlog', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MumbleSlog);

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
