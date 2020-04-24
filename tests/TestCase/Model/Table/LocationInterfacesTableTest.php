<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LocationInterfacesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LocationInterfacesTable Test Case
 */
class LocationInterfacesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LocationInterfacesTable
     */
    public $LocationInterfaces;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.LocationInterfaces',
        'app.Locations',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('LocationInterfaces') ? [] : ['className' => LocationInterfacesTable::class];
        $this->LocationInterfaces = TableRegistry::getTableLocator()->get('LocationInterfaces', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LocationInterfaces);

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
