<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WaitsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WaitsTable Test Case
 */
class WaitsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WaitsTable
     */
    public $Waits;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.waits',
        'app.users',
        'app.menber_types',
        'app.jobs',
        'app.passwords',
        'app.administrators',
        'app.facilities',
        'app.facility_images',
        'app.frames',
        'app.court_types',
        'app.queues',
        'app.reserveables',
        'app.reserves',
        'app.notifies'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Waits') ? [] : ['className' => 'App\Model\Table\WaitsTable'];
        $this->Waits = TableRegistry::get('Waits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Waits);

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
