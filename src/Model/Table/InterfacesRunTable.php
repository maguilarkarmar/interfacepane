<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InterfacesRun Model
 *
 * @property \App\Model\Table\LocationInterfacesTable&\Cake\ORM\Association\BelongsTo $LocationInterfaces
 *
 * @method \App\Model\Entity\InterfacesRun get($primaryKey, $options = [])
 * @method \App\Model\Entity\InterfacesRun newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\InterfacesRun[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InterfacesRun|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InterfacesRun saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InterfacesRun patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InterfacesRun[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\InterfacesRun findOrCreate($search, callable $callback = null, $options = [])
 */
class InterfacesRunTable extends Table
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

        $this->setTable('interfaces_run');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('LocationInterfaces', [
            'foreignKey' => 'location_interface_id',
            'joinType' => 'INNER',
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->dateTime('run_started')
            ->requirePresence('run_started', 'create')
            ->notEmptyDateTime('run_started');

        $validator
            ->dateTime('run_ended')
            ->requirePresence('run_ended', 'create')
            ->notEmptyDateTime('run_ended');

        $validator
            ->scalar('ouput')
            ->maxLength('ouput', 500)
            ->requirePresence('ouput', 'create')
            ->notEmptyString('ouput');

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
        $rules->add($rules->existsIn(['location_interface_id'], 'LocationInterfaces'));

        return $rules;
    }
}
