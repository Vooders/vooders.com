<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HearthstoneCardsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HearthstoneCardsTable Test Case
 */
class HearthstoneCardsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HearthstoneCardsTable
     */
    public $HearthstoneCards;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.hearthstone_cards'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('HearthstoneCards') ? [] : ['className' => 'App\Model\Table\HearthstoneCardsTable'];
        $this->HearthstoneCards = TableRegistry::get('HearthstoneCards', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->HearthstoneCards);

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
