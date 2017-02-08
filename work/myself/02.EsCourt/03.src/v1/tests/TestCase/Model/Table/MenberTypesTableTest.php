<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MenberTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MenberTypesTable Test Case
 */
class MenberTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MenberTypesTable
     */
    public $MenberTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.menber_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MenberTypes') ? [] : ['className' => 'App\Model\Table\MenberTypesTable'];
        $this->MenberTypes = TableRegistry::get('MenberTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MenberTypes);

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
}
