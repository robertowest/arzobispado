<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ProtocoloDesignacionesTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('protocolo_designaciones');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Protocolos', ['foreignKey' => 'protocolo_id',
                                        'joinType' => 'INNER']);
        $this->belongsTo('Sacerdotes', ['foreignKey' => 'sacerdote_id',
                                        'joinType' => 'INNER']);
        $this->belongsTo('Funciones', ['foreignKey' => 'funcion_id',
                                       'joinType' => 'INNER']);
        $this->belongsTo('Instituciones', ['foreignKey' => 'institucion_id',
                                           'joinType' => 'INNER']);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('etiqueta_protocolo');

        $validator
            ->date('falta')
            ->allowEmpty('falta');

        $validator
            ->date('fbaja')
            ->allowEmpty('fbaja');

        $validator
            ->allowEmpty('comentario');

        $validator
            ->integer('orden')
            ->allowEmpty('orden');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['protocolo_id'], 'Protocolos'));
        $rules->add($rules->existsIn(['sacerdote_id'], 'Sacerdotes'));
        $rules->add($rules->existsIn(['funcion_id'], 'Funciones'));
        $rules->add($rules->existsIn(['institucion_id'], 'Instituciones'));

        return $rules;
    }
}
