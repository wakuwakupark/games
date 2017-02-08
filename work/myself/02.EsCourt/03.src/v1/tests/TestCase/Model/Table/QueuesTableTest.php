<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QueuesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QueuesTable Test Case
 */
class QueuesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\QueuesTable
     */
    public $Queues;

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
        'app.facility_images',
        'app.waits',
        'app.reserves',
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
        $config = TableRegistry::exists('Queues') ? [] : ['className' => 'App\Model\Table\QueuesTable'];
        $this->Queues = TableRegistry::get('Queues', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Queues);

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
