<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\Event\Event;
use ArrayObject;

class TramiteBautismosTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('tramite_bautismos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Protocolos', [
            'foreignKey' => 'protocolo_id'
        ]);
        $this->belongsTo('Instituciones', [
            'foreignKey' => 'parroquia_id'
        ]);
    }

    public function beforeSave(Event $event, EntityInterface $entity, ArrayObject $options)
    {
        if(!empty($entity->interesado_nombre)) 
            $entity->interesado_nombre = ucwords($entity->interesado_nombre);
        
        if(!empty($entity->padre_nombre)) 
            $entity->padre_nombre = ucwords($entity->padre_nombre);

        if(!empty($entity->madre_nombre)) 
            $entity->madre_nombre = ucwords($entity->madre_nombre);

        //if(!empty($entity->interesado_fnacimiento)) 
        //    $entity->interesado_fnacimiento = date('Y-m-d', strtotime($entity->interesado_fnacimiento));

        if(!empty($entity->interesado_dni)) 
            $entity->interesado_dni = str_replace('.', '', $entity->interesado_dni);

        if(!empty($entity->padre_dni)) 
            $entity->padre_dni = str_replace('.', '', $entity->padre_dni);

        if(!empty($entity->madre_dni)) 
            $entity->madre_dni = str_replace('.', '', $entity->madre_dni);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('interesado_nombre', 'create')
            ->notEmpty('interesado_nombre');

        $validator
            ->date('interesado_fnacimiento')
            ->allowEmpty('interesado_fnacimiento');

        $validator
            ->allowEmpty('interesado_dni');

        $validator
        ->allowEmpty('padre_nombre');

        $validator
            ->allowEmpty('padre_dni');

        $validator
            ->allowEmpty('madre_nombre');

        $validator
            ->allowEmpty('madre_dni');

        $validator
            ->allowEmpty('active');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['protocolo_id'], 'Protocolos'));
        $rules->add($rules->existsIn(['parroquia_id'], 'Instituciones'));

        return $rules;
    }
}
