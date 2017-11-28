<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProtocoloDesignacionesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProtocoloDesignacionesTable Test Case
 */
class ProtocoloDesignacionesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProtocoloDesignacionesTable
     */
    public $ProtocoloDesignaciones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.protocolo_designaciones',
        'app.protocolos',
        'app.protocolo_tipo',
        'app.documents',
        'app.usuarios',
        'app.sacerdotes',
        'app.funcion_sacerdote_institucion',
        'app.funciones',
        'app.instituciones'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProtocoloDesignaciones') ? [] : ['className' => 'App\Model\Table\ProtocoloDesignacionesTable'];
        $this->ProtocoloDesignaciones = TableRegistry::get('ProtocoloDesignaciones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProtocoloDesignaciones);

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
