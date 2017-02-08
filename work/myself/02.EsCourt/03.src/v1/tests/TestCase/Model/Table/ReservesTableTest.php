<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReservesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReservesTable Test Case
 */
class ReservesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ReservesTable
     */
    public $Reserves;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.reserves',
        'app.users',
        'app.frames',
        'app.court_types',
        'app.facilities',
        'app.administrators',
        'app.menber_types',
        'app.passwords',
        'app.facility_images',
        'app.waits',
        'app.queues',
        'app.reserveables'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Reserves') ? [] : ['className' => 'App\Model\Table\ReservesTable'];
        $this->Reserves = TableRegistry::get('Reserves', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Reserves);

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
