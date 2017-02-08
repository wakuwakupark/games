<?php
namespace App\Test\TestCase\Controller;

use App\Controller\PasswordsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\PasswordsController Test Case
 */
class PasswordsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.passwords',
        'app.users',
        'app.menber_types',
        'app.jobs',
        'app.reserves',
        'app.frames',
        'app.court_types',
        'app.facilities',
        'app.administrators',
        'app.facility_images',
        'app.waits',
        'app.notifies',
        'app.reserveables',
        'app.queues'
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
