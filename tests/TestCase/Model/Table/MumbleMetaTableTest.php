<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MumbleMetaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MumbleMetaTable Test Case
 */
class MumbleMetaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MumbleMetaTable
     */
    public $MumbleMeta;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.mumble_meta'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MumbleMeta') ? [] : ['className' => 'App\Model\Table\MumbleMetaTable'];
        $this->MumbleMeta = TableRegistry::get('MumbleMeta', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MumbleMeta);

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
     * Test defaultConnectionName method
     *
     * @return void
     */
    public function testDefaultConnectionName()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
