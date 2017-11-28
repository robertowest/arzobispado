<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class SacerdotesTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('sacerdotes');
        $this->setDisplayField('nombre_completo');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('FuncionSacerdoteInstitucion', ['foreignKey' => 'sacerdote_id']);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('apellido', 'create')
            ->notEmpty('apellido');

        $validator
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre');

        $validator
            ->allowEmpty('dni');

        $validator
            ->date('fnacimiento')
            ->allowEmpty('fnacimiento');

        $validator
            ->date('fordenacion')
            ->allowEmpty('fordenacion');

        $validator
            ->allowEmpty('protocolo');

        return $validator;
    }
}
