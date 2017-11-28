<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class FojasTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('funcion_sacerdote_institucion');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Funciones', ['foreignKey' => 'funcion_id',
                                       'joinType' => 'INNER']);

        $this->belongsTo('Sacerdotes', ['foreignKey' => 'sacerdote_id',
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
            ->allowEmpty('protocolo');

        $validator
            //->add('falta', 'valid', ['rule' => ['date', 'ymd']])
            ->date('falta')
            ->allowEmpty('falta');

        $validator
            //->add('falta', 'valid', ['rule' => ['date', 'ymd']])
            ->date('fbaja')
            ->allowEmpty('fbaja');

        $validator
            ->integer('orden')
            ->allowEmpty('orden');

        $validator
            ->requirePresence('file_name', 'create')
            ->allowEmpty('file_name', 'update');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['funcion_id'], 'Funciones'));
        $rules->add($rules->existsIn(['sacerdote_id'], 'Sacerdotes'));
        $rules->add($rules->existsIn(['institucion_id'], 'Instituciones'));

        return $rules;
    }
}
