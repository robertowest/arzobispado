<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProtocoloCampos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ProtocoloTipo
 * @property \Cake\ORM\Association\HasMany $ProtocoloCampoContenido
 *
 * @method \App\Model\Entity\ProtocoloCampo get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProtocoloCampo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProtocoloCampo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProtocoloCampo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProtocoloCampo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProtocoloCampo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProtocoloCampo findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProtocoloCamposTable extends Table
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

        $this->setTable('protocolo_campos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ProtocoloTipo', [
            'foreignKey' => 'protocolo_tipo_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('ProtocoloCampoContenido', [
            'foreignKey' => 'protocolo_campo_id'
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

        $validator
            ->requirePresence('tipo', 'create')
            ->notEmpty('tipo');

        $validator
            ->allowEmpty('active');

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

        return $rules;
    }
}
