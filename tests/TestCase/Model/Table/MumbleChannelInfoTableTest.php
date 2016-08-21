<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MumbleChannelInfoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MumbleChannelInfoTable Test Case
 */
class MumbleChannelInfoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MumbleChannelInfoTable
     */
    public $MumbleChannelInfo;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.mumble_channel_info',
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
        $config = TableRegistry::exists('MumbleChannelInfo') ? [] : ['className' => 'App\Model\Table\MumbleChannelInfoTable'];
        $this->MumbleChannelInfo = TableRegistry::get('MumbleChannelInfo', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MumbleChannelInfo);

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
