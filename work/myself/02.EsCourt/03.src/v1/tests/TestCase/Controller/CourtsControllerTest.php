<?php
namespace App\Test\TestCase\Controller;

use App\Controller\CourtsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\CourtsController Test Case
 */
class CourtsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.courts',
        'app.court_types',
        'app.facilities',
        'app.administrators',
        'app.menber_types',
        'app.passwords',
        'app.users',
        'app.jobs',
        'app.reserves',
        'app.frames',
        'app.queues',
        'app.reserveables',
        'app.waits',
        'app.notifies',
        'app.facility_images'
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
