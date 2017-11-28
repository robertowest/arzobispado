<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProtocoloCampoContenidoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProtocoloCampoContenidoTable Test Case
 */
class ProtocoloCampoContenidoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProtocoloCampoContenidoTable
     */
    public $ProtocoloCampoContenido;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.protocolo_campo_contenido',
        'app.protocolo_campos',
        'app.protocolo_tipo'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProtocoloCampoContenido') ? [] : ['className' => 'App\Model\Table\ProtocoloCampoContenidoTable'];
        $this->ProtocoloCampoContenido = TableRegistry::get('ProtocoloCampoContenido', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProtocoloCampoContenido);

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
