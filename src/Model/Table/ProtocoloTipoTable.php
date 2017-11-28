<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\Datasource\ConnectionManager;
use Cake\Log\Log;

/**
 * ProtocoloTipo Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ParentProtocoloTipo
 * @property \Cake\ORM\Association\HasMany $ChildProtocoloTipo
 *
 * @method \App\Model\Entity\ProtocoloTipo get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProtocoloTipo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProtocoloTipo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProtocoloTipo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProtocoloTipo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProtocoloTipo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProtocoloTipo findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProtocoloTipoTable extends Table
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

        $this->setTable('protocolo_tipo');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ParentProtocoloTipo', [
            'className' => 'ProtocoloTipo',
            'foreignKey' => 'parent_id'
        ]);

        $this->hasMany('ChildProtocoloTipo', [
            'className' => 'ProtocoloTipo',
            'foreignKey' => 'parent_id'
        ]);

        /*
        $this->hasMany('Protocolos', [
            'foreignKey' => 'protocolo_tipo_id'
        ]);
        */
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
            ->allowEmpty('name');

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
        $rules->add($rules->existsIn(['parent_id'], 'ParentProtocoloTipo'));

        return $rules;
    }

    /*
    public function findAllowedListItem(Query $query, array $options)
    {
        $data = $query->find('list', ['keyField' => 'id', 'valueField' => 'name']);
        Log::write('debug', json_encode($data));
        return $data;
    }
    */

    public function GetAllowedListItem()
    {
        /*
        $sql = '';
        $sql = $sql . 'SELECT id, GetPath(id) AS name ';
        $sql = $sql . 'FROM (SELECT t1.id ';
        $sql = $sql .       'FROM protocolo_tipo AS t1 ';
        $sql = $sql .       'LEFT JOIN protocolo_tipo as t2 ON t1.id = t2.parent_id ';
        $sql = $sql .       'WHERE t2.id IS NULL) tmp';

        return $this->connection()->execute($sql)->fetchAll('assoc');
        */

        $sql = '';
        $sql = $sql . '(SELECT t1.id ';
        $sql = $sql .  'FROM protocolo_tipo AS t1 ';
        $sql = $sql .  'LEFT JOIN protocolo_tipo as t2 ON t1.id = t2.parent_id ';
        $sql = $sql .  'WHERE t2.id IS NULL)';

        $query = $this->find('list')
                      ->select(['id', 'name'=>'GetPath(id)'])
                      ->where('id IN '.$sql)
                      ;
        return $query;
    }
}
