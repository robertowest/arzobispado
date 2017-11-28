<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProtocoloCampoContenidoFixture
 *
 */
class ProtocoloCampoContenidoFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'protocolo_campo_contenido';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'protocolo_campo_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'campo' => ['type' => 'string', 'length' => 240, 'null' => false, 'default' => null, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'protocolo_campo_id' => ['type' => 'index', 'columns' => ['protocolo_campo_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'protocolo_campo_contenido_ibfk_1' => ['type' => 'foreign', 'columns' => ['protocolo_campo_id'], 'references' => ['protocolo_campos', 'id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_spanish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'protocolo_campo_id' => 1,
            'campo' => 'Lorem ipsum dolor sit amet',
            'created' => '2017-10-27 11:31:27',
            'modified' => '2017-10-27 11:31:27'
        ],
    ];
}
