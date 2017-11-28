<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProtocoloDesignacionesFixture
 *
 */
class ProtocoloDesignacionesFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'protocolo_designaciones';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'protocolo_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'sacerdote_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'funcion_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'institucion_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'etiqueta_protocolo' => ['type' => 'string', 'length' => 8, 'null' => true, 'default' => null, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'falta' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'fbaja' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'comentario' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'precision' => null],
        'orden' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'protocolo_id' => ['type' => 'index', 'columns' => ['protocolo_id'], 'length' => []],
            'sacerdote_id' => ['type' => 'index', 'columns' => ['sacerdote_id'], 'length' => []],
            'institucion_id' => ['type' => 'index', 'columns' => ['institucion_id'], 'length' => []],
            'funcion_id' => ['type' => 'index', 'columns' => ['funcion_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'protocolo_designaciones_ibfk_1' => ['type' => 'foreign', 'columns' => ['sacerdote_id'], 'references' => ['sacerdotes', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'protocolo_designaciones_ibfk_2' => ['type' => 'foreign', 'columns' => ['institucion_id'], 'references' => ['instituciones', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'protocolo_designaciones_ibfk_3' => ['type' => 'foreign', 'columns' => ['funcion_id'], 'references' => ['funciones', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'protocolo_designaciones_ibfk_4' => ['type' => 'foreign', 'columns' => ['protocolo_id'], 'references' => ['protocolos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'protocolo_id' => 1,
            'sacerdote_id' => 1,
            'funcion_id' => 1,
            'institucion_id' => 1,
            'etiqueta_protocolo' => 'Lorem ',
            'falta' => '2017-11-09',
            'fbaja' => '2017-11-09',
            'comentario' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'orden' => 1,
            'created' => '2017-11-09',
            'modified' => '2017-11-09'
        ],
    ];
}
