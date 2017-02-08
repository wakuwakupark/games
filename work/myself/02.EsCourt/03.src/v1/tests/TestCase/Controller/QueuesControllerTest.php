<?php
namespace App\Test\TestCase\Controller;

use App\Controller\QueuesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\QueuesController Test Case
 */
class QueuesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.queues',
        'app.frames',
        'app.court_types',
        'app.facilities',
        'app.administrators',
        'app.menber_types',
        'app.passwords',
        'app.users',
        'app.jobs',
        'app.reserves',
        'app.waits',
        'app.notifies',
        'app.reserveables',
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
