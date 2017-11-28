<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProtocoloCamposTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProtocoloCamposTable Test Case
 */
class ProtocoloCamposTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProtocoloCamposTable
     */
    public $ProtocoloCampos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.protocolo_campos',
        'app.protocolo_tipo',
        'app.protocolo_campo_contenido'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProtocoloCampos') ? [] : ['className' => 'App\Model\Table\ProtocoloCamposTable'];
        $this->ProtocoloCampos = TableRegistry::get('ProtocoloCampos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProtocoloCampos);

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
