<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MumbleChannelLinksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MumbleChannelLinksTable Test Case
 */
class MumbleChannelLinksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MumbleChannelLinksTable
     */
    public $MumbleChannelLinks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.mumble_channel_links',
        'app.mumble_channels',
        'app.mumble_servers',
        'app.servers',
        'app.channels',
        'app.links'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MumbleChannelLinks') ? [] : ['className' => 'App\Model\Table\MumbleChannelLinksTable'];
        $this->MumbleChannelLinks = TableRegistry::get('MumbleChannelLinks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MumbleChannelLinks);

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
