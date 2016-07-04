<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OverwatchCharactersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OverwatchCharactersTable Test Case
 */
class OverwatchCharactersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OverwatchCharactersTable
     */
    public $OverwatchCharacters;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.overwatch_characters',
        'app.overwatch_stats'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OverwatchCharacters') ? [] : ['className' => 'App\Model\Table\OverwatchCharactersTable'];
        $this->OverwatchCharacters = TableRegistry::get('OverwatchCharacters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OverwatchCharacters);

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
}
