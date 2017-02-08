<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Waits Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Notifies
 * @property \Cake\ORM\Association\BelongsTo $Facilities
 * @property \Cake\ORM\Association\HasMany $Reserveables
 *
 * @method \App\Model\Entity\Wait get($primaryKey, $options = [])
 * @method \App\Model\Entity\Wait newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Wait[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Wait|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Wait patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Wait[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Wait findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class WaitsTable extends Table
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

        $this->table('waits');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('Notifies', [
            'foreignKey' => 'notify_id'
        ]);
        $this->belongsTo('Facilities', [
            'foreignKey' => 'facility_id'
        ]);
        $this->hasMany('Reserveables', [
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
            ->dateTime('deleted')
            ->allowEmpty('deleted');

        $validator
            ->numeric('central_latitude')
            ->allowEmpty('central_latitude');

        $validator
            ->numeric('central_longitude')
            ->allowEmpty('central_longitude');

        $validator
            ->integer('distance')
            ->allowEmpty('distance');

        $validator
            ->dateTime('start')
            ->allowEmpty('start');

        $validator
            ->allowEmpty('end');

        $validator
            ->integer('size')
            ->allowEmpty('size');

        $validator
            ->integer('succession')
            ->allowEmpty('succession');

        $validator
            ->integer('must')
            ->allowEmpty('must');

        $validator
            ->integer('max_price')
            ->allowEmpty('max_price');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['notify_id'], 'Notifies'));
        $rules->add($rules->existsIn(['facility_id'], 'Facilities'));

        return $rules;
    }
}
