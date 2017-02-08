<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ReservesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ReservesController Test Case
 */
class ReservesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.reserves',
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
        'app.waits',
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
