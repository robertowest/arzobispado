<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Protocolos Model
 *
 * @method \App\Model\Entity\Protocolo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Protocolo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Protocolo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Protocolo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Protocolo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Protocolo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Protocolo findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProtocolosTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('protocolos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ProtocoloTipo', [
            'foreignKey' => 'protocolo_tipo_id', 
            'joinType' => 'INNER']);

        // agregado para probar como funciona
        // SELECT protocolo_id, id, 'protocolo_designaciones' as model 
        // FROM protocolo_designaciones
        $this->hasMany('ProtocoloDesignaciones')
             ->setForeignKey('protocolo_id');

        $this->hasMany('TramiteBautismos')
             ->setForeignKey('protocolo_id');

        // agregada para funcionar con Documents
        $this->hasMany('Documents')
             ->setForeignKey('controller_id')
             ->conditions(['Documents.controller' => 'Protocolos']);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('protocolo')
            ->requirePresence('protocolo', 'create')
            ->notEmpty('protocolo');

        $validator
            ->integer('año')
            ->requirePresence('año', 'create')
            ->notEmpty('año');

        $validator
            ->notEmpty('tipo_protocolo');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['protocolo_tipo_id'], 'ProtocoloTipo'));
        $rules->add($rules->isUnique(['protocolo', 'año'],
            'La combinación protocolo y año ya existe.'
        ));
        return $rules;
    }
}
