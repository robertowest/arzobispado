<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TramiteBautismosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TramiteBautismosTable Test Case
 */
class TramiteBautismosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TramiteBautismosTable
     */
    public $TramiteBautismos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tramite_bautismos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TramiteBautismos') ? [] : ['className' => 'App\Model\Table\TramiteBautismosTable'];
        $this->TramiteBautismos = TableRegistry::get('TramiteBautismos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TramiteBautismos);

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
