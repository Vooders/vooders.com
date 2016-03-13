<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HearthstoneDecksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HearthstoneDecksTable Test Case
 */
class HearthstoneDecksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HearthstoneDecksTable
     */
    public $HearthstoneDecks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.hearthstone_decks',
        'app.users',
        'app.user_contacts',
        'app.user_emails',
        'app.battle_tags',
        'app.hots_logs',
        'app.hearthstone_decks_cards'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('HearthstoneDecks') ? [] : ['className' => 'App\Model\Table\HearthstoneDecksTable'];
        $this->HearthstoneDecks = TableRegistry::get('HearthstoneDecks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->HearthstoneDecks);

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
