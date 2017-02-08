<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReserveablesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReserveablesTable Test Case
 */
class ReserveablesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ReserveablesTable
     */
    public $Reserveables;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.reserveables',
        'app.waits'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Reserveables') ? [] : ['className' => 'App\Model\Table\ReserveablesTable'];
        $this->Reserveables = TableRegistry::get('Reserveables', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Reserveables);

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
