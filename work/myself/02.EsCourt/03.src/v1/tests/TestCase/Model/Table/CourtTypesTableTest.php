<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CourtTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CourtTypesTable Test Case
 */
class CourtTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CourtTypesTable
     */
    public $CourtTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.court_types',
        'app.frames',
        'app.courts',
        'app.queues',
        'app.reserveables',
        'app.waits',
        'app.users',
        'app.menber_types',
        'app.jobs',
        'app.passwords',
        'app.administrators',
        'app.facilities',
        'app.facility_images',
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
        $config = TableRegistry::exists('CourtTypes') ? [] : ['className' => 'App\Model\Table\CourtTypesTable'];
        $this->CourtTypes = TableRegistry::get('CourtTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CourtTypes);

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
