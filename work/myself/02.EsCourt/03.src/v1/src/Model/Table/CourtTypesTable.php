<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CourtTypes Model
 *
 * @property \Cake\ORM\Association\HasMany $Courts
 *
 * @method \App\Model\Entity\CourtType get($primaryKey, $options = [])
 * @method \App\Model\Entity\CourtType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CourtType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CourtType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CourtType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CourtType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CourtType findOrCreate($search, callable $callback = null, $options = [])
 */
class CourtTypesTable extends Table
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

        $this->table('court_types');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Courts', [
            'foreignKey' => 'court_type_id'
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
            ->allowEmpty('name');

        return $validator;
    }
}
