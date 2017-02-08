<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FramesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FramesTable Test Case
 */
class FramesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FramesTable
     */
    public $Frames;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        'app.facility_images',
        'app.queues'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Frames') ? [] : ['className' => 'App\Model\Table\FramesTable'];
        $this->Frames = TableRegistry::get('Frames', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Frames);

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
