<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TramiteBautismosFixture
 *
 */
class TramiteBautismosFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'tramite_bautismos';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'protocolo_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'parroquia_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'interesado_nombre' => ['type' => 'string', 'length' => 60, 'null' => false, 'default' => null, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'interesado_fnacimiento' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'interesado_dni' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'padre_nombre' => ['type' => 'string', 'length' => 60, 'null' => false, 'default' => null, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'padre_dni' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'madre_nombre' => ['type' => 'string', 'length' => 60, 'null' => false, 'default' => null, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'madre_dni' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'active' => ['type' => 'string', 'length' => null, 'null' => true, 'default' => null, 'collate' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'parroquia_id' => ['type' => 'index', 'columns' => ['parroquia_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'tramite_bautismos_ibfk_1' => ['type' => 'foreign', 'columns' => ['parroquia_id'], 'references' => ['instituciones', 'id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
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
            'parroquia_id' => 1,
            'interesado_nombre' => 'Lorem ipsum dolor sit amet',
            'interesado_fnacimiento' => '2017-11-21 14:01:31',
            'interesado_dni' => '2017-11-21 14:01:31',
            'padre_nombre' => 'Lorem ipsum dolor sit amet',
            'padre_dni' => '2017-11-21 14:01:31',
            'madre_nombre' => 'Lorem ipsum dolor sit amet',
            'madre_dni' => '2017-11-21 14:01:31',
            'active' => 'Lorem ipsum dolor sit amet',
            'created' => '2017-11-21 14:01:31',
            'modified' => '2017-11-21 14:01:31'
        ],
    ];
}
