<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FacilitiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FacilitiesTable Test Case
 */
class FacilitiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FacilitiesTable
     */
    public $Facilities;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.facilities',
        'app.administrators',
        'app.menber_types',
        'app.passwords',
        'app.users',
        'app.jobs',
        'app.reserves',
        'app.frames',
        'app.courts',
        'app.queues',
        'app.reserveables',
        'app.waits',
        'app.notifies',
        'app.facility_images'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Facilities') ? [] : ['className' => 'App\Model\Table\FacilitiesTable'];
        $this->Facilities = TableRegistry::get('Facilities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Facilities);

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
