<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NotifiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NotifiesTable Test Case
 */
class NotifiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NotifiesTable
     */
    public $Notifies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.notifies',
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
        $config = TableRegistry::exists('Notifies') ? [] : ['className' => 'App\Model\Table\NotifiesTable'];
        $this->Notifies = TableRegistry::get('Notifies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Notifies);

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
