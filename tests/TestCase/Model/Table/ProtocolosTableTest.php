<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProtocolosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProtocolosTable Test Case
 */
class ProtocolosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProtocolosTable
     */
    public $Protocolos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.protocolos',
        'app.protocolo_tipo',
        'app.documents',
        'app.usuarios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Protocolos') ? [] : ['className' => 'App\Model\Table\ProtocolosTable'];
        $this->Protocolos = TableRegistry::get('Protocolos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Protocolos);

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
