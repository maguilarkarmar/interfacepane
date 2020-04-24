<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LatestRunsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LatestRunsTable Test Case
 */
class LatestRunsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LatestRunsTable
     */
    public $LatestRuns;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.LatestRuns',
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
        $config = TableRegistry::getTableLocator()->exists('LatestRuns') ? [] : ['className' => LatestRunsTable::class];
        $this->LatestRuns = TableRegistry::getTableLocator()->get('LatestRuns', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LatestRuns);

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
