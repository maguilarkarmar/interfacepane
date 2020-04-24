<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InterfacesRunTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InterfacesRunTable Test Case
 */
class InterfacesRunTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\InterfacesRunTable
     */
    public $InterfacesRun;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.InterfacesRun',
        'app.LocationInterfaces',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('InterfacesRun') ? [] : ['className' => InterfacesRunTable::class];
        $this->InterfacesRun = TableRegistry::getTableLocator()->get('InterfacesRun', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InterfacesRun);

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
