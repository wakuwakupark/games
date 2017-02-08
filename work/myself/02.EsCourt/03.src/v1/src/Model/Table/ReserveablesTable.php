<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Reserveables Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Waits
 *
 * @method \App\Model\Entity\Reserveable get($primaryKey, $options = [])
 * @method \App\Model\Entity\Reserveable newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Reserveable[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Reserveable|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Reserveable patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Reserveable[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Reserveable findOrCreate($search, callable $callback = null, $options = [])
 */
class ReserveablesTable extends Table
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

        $this->table('reserveables');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Waits', [
            'foreignKey' => 'wait_id'
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
            ->dateTime('confirmed')
            ->allowEmpty('confirmed');

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
        $rules->add($rules->existsIn(['wait_id'], 'Waits'));

        return $rules;
    }
}
