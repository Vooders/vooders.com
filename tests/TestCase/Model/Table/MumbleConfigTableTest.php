<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MumbleConfigTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MumbleConfigTable Test Case
 */
class MumbleConfigTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MumbleConfigTable
     */
    public $MumbleConfig;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.mumble_config',
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
        $config = TableRegistry::exists('MumbleConfig') ? [] : ['className' => 'App\Model\Table\MumbleConfigTable'];
        $this->MumbleConfig = TableRegistry::get('MumbleConfig', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MumbleConfig);

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
