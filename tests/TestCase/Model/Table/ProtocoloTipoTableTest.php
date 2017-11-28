<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProtocoloTipoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProtocoloTipoTable Test Case
 */
class ProtocoloTipoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProtocoloTipoTable
     */
    public $ProtocoloTipo;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('ProtocoloTipo') ? [] : ['className' => 'App\Model\Table\ProtocoloTipoTable'];
        $this->ProtocoloTipo = TableRegistry::get('ProtocoloTipo', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProtocoloTipo);

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
