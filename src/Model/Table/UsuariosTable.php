<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsuariosTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('usuarios');
        $this->setDisplayField('nombre_completo');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('nombre');

        $validator
            ->allowEmpty('apellido');

        $validator
            ->allowEmpty('login');

        $validator
            ->allowEmpty('passwd');

        $validator
            ->allowEmpty('rol');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['login']));
        return $rules;
    }

    public function beforeSave(Event $event)
    {
        $entity = $event->getData('entity');

        if($entity->isNew())
        {
            //on create
        }
        else
        {
            //on update
        }

        $entity->nombre = ucwords(strtolower($entity->nombre));
        $entity->apellido = strtoupper($entity->apellido);
        //$entity->fnacimiento = date('d-m-Y', strtotime($entity->fnacimiento));
        //$entity->fordenacion = date('d-m-Y', strtotime($entity->fordenacion));
        return true;
    }
}