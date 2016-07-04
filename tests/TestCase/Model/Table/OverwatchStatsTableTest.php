<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OverwatchStatsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OverwatchStatsTable Test Case
 */
class OverwatchStatsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OverwatchStatsTable
     */
    public $OverwatchStats;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.overwatch_stats',
        'app.users',
        'app.user_contacts',
        'app.user_emails',
        'app.battle_tags',
        'app.hots_logs',
        'app.steam_ids',
        'app.overwatch_characters'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OverwatchStats') ? [] : ['className' => 'App\Model\Table\OverwatchStatsTable'];
        $this->OverwatchStats = TableRegistry::get('OverwatchStats', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OverwatchStats);

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
}
