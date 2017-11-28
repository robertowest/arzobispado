<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class DocumentsTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('documents');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        // asociamos este modelo al modelo que lo vaya a utilizar
        $this->belongsTo('Protocolos');
        $this->belongsTo('Usuarios');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('filename', 'create')
            ->notEmpty('filename');

        $validator
            ->requirePresence('filepath', 'create')
            ->notEmpty('filepath');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        //$rules->add($rules->existsIn(['application_id'], 'Applications'));
        $rules->add($rules->existsIn(['user_id'], 'Usuarios'));
        return $rules;
    }
}