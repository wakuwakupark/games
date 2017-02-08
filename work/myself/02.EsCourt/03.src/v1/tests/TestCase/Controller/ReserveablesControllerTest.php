<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ReserveablesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ReserveablesController Test Case
 */
class ReserveablesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.reserveables',
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
        'app.reserves',
        'app.notifies'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
