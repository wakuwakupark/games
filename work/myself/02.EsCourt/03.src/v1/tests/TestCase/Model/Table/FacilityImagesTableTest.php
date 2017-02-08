<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FacilityImagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FacilityImagesTable Test Case
 */
class FacilityImagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FacilityImagesTable
     */
    public $FacilityImages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.facility_images',
        'app.facilities',
        'app.administrators',
        'app.menber_types',
        'app.passwords',
        'app.frames',
        'app.waits'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('FacilityImages') ? [] : ['className' => 'App\Model\Table\FacilityImagesTable'];
        $this->FacilityImages = TableRegistry::get('FacilityImages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FacilityImages);

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
