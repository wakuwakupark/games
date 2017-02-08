<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Frames Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Courts
 * @property \Cake\ORM\Association\HasMany $Queues
 * @property \Cake\ORM\Association\HasMany $Reserves
 *
 * @method \App\Model\Entity\Frame get($primaryKey, $options = [])
 * @method \App\Model\Entity\Frame newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Frame[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Frame|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Frame patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Frame[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Frame findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FramesTable extends Table
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

        $this->table('frames');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Courts', [
            'foreignKey' => 'court_id'
        ]);
        $this->hasMany('Queues', [
            'foreignKey' => 'frame_id'
        ]);
        $this->hasMany('Reserves', [
            'foreignKey' => 'frame_id'
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
            ->dateTime('start')
            ->allowEmpty('start');

        $validator
            ->integer('reserved')
            ->allowEmpty('reserved');

        $validator
            ->integer('end')
            ->allowEmpty('end');

        $validator
            ->integer('price')
            ->allowEmpty('price');

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
        $rules->add($rules->existsIn(['court_id'], 'Courts'));

        return $rules;
    }
}
