<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProtocoloCampoContenido Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ProtocoloCampos
 *
 * @method \App\Model\Entity\ProtocoloCampoContenido get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProtocoloCampoContenido newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProtocoloCampoContenido[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProtocoloCampoContenido|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProtocoloCampoContenido patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProtocoloCampoContenido[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProtocoloCampoContenido findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProtocoloCampoContenidoTable extends Table
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

        $this->setTable('protocolo_campo_contenido');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ProtocoloCampos', [
            'foreignKey' => 'protocolo_campo_id',
            'joinType' => 'INNER'
        ]);
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
            ->requirePresence('campo', 'create')
            ->notEmpty('campo');

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
        $rules->add($rules->existsIn(['protocolo_campo_id'], 'ProtocoloCampos'));

        return $rules;
    }
}
