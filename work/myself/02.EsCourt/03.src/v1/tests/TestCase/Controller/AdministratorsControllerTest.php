<?php
namespace App\Test\TestCase\Controller;

use App\Controller\AdministratorsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\AdministratorsController Test Case
 */
class AdministratorsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.administrators',
        'app.menber_types',
        'app.facilities',
        'app.facility_images',
        'app.frames',
        'app.court_types',
        'app.queues',
        'app.reserveables',
        'app.waits',
        'app.users',
        'app.jobs',
        'app.passwords',
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
