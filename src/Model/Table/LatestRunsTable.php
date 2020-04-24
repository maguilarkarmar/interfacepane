<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LatestRuns Model
 *
 * @property \App\Model\Table\LocationInterfacesTable&\Cake\ORM\Association\BelongsTo $LocationInterfaces
 * @property \App\Model\Table\LocationsTable&\Cake\ORM\Association\BelongsTo $Locations
 *
 * @method \App\Model\Entity\LatestRun get($primaryKey, $options = [])
 * @method \App\Model\Entity\LatestRun newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\LatestRun[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LatestRun|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LatestRun saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LatestRun patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LatestRun[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\LatestRun findOrCreate($search, callable $callback = null, $options = [])
 */
class LatestRunsTable extends Table
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

        $this->setTable('latest_runs');

        $this->belongsTo('LocationInterfaces', [
            'foreignKey' => 'location_interface_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id',
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
            ->requirePresence('id', 'create')
            ->notEmptyString('id');

        $validator
            ->dateTime('run_started')
            ->allowEmptyDateTime('run_started');

        $validator
            ->dateTime('run_ended')
            ->allowEmptyDateTime('run_ended');

        $validator
            ->scalar('ouput')
            ->maxLength('ouput', 500)
            ->allowEmptyString('ouput');

        $validator
            ->scalar('status')
            ->maxLength('status', 45)
            ->notEmptyString('status');

        $validator
            ->scalar('interface_name')
            ->maxLength('interface_name', 45)
            ->allowEmptyString('interface_name');

        $validator
            ->scalar('interface_path')
            ->maxLength('interface_path', 45)
            ->allowEmptyString('interface_path');

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
        $rules->add($rules->existsIn(['location_id'], 'Locations'));

        return $rules;
    }
}
