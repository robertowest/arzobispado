<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProtocoloTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProtocoloTable Test Case
 */
class ProtocoloTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProtocoloTable
     */
    public $Protocolo;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.protocolo'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Protocolo') ? [] : ['className' => 'App\Model\Table\ProtocoloTable'];
        $this->Protocolo = TableRegistry::get('Protocolo', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Protocolo);

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
