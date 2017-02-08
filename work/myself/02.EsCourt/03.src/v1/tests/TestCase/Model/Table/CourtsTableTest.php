<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CourtsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CourtsTable Test Case
 */
class CourtsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CourtsTable
     */
    public $Courts;

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
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Courts') ? [] : ['className' => 'App\Model\Table\CourtsTable'];
        $this->Courts = TableRegistry::get('Courts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Courts);

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
