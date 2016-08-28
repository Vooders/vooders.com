<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DotNetCountsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DotNetCountsTable Test Case
 */
class DotNetCountsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DotNetCountsTable
     */
    public $DotNetCounts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.dot_net_counts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DotNetCounts') ? [] : ['className' => 'App\Model\Table\DotNetCountsTable'];
        $this->DotNetCounts = TableRegistry::get('DotNetCounts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DotNetCounts);

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
