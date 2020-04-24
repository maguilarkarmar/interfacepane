<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LocationInterfaces Model
 *
 * @property \App\Model\Table\LocationsTable&\Cake\ORM\Association\BelongsTo $Locations
 *
 * @method \App\Model\Entity\LocationInterface get($primaryKey, $options = [])
 * @method \App\Model\Entity\LocationInterface newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\LocationInterface[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LocationInterface|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LocationInterface saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LocationInterface patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LocationInterface[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\LocationInterface findOrCreate($search, callable $callback = null, $options = [])
 */
class LocationInterfacesTable extends Table
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

        $this->setTable('location_interfaces');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id',
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
            ->scalar('interface_name')
            ->maxLength('interface_name', 300)
            ->allowEmptyString('interface_name');

        $validator
            ->scalar('interface_description')
            ->maxLength('interface_description', 300)
            ->allowEmptyString('interface_description');

        $validator
            ->scalar('interface_path')
            ->maxLength('interface_path', 300)
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
        $rules->add($rules->existsIn(['location_id'], 'Locations'));

        return $rules;
    }
}
