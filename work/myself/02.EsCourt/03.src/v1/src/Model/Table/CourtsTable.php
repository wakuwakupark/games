<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Courts Model
 *
 * @property \Cake\ORM\Association\BelongsTo $CourtTypes
 * @property \Cake\ORM\Association\BelongsTo $Facilities
 * @property \Cake\ORM\Association\HasMany $Frames
 *
 * @method \App\Model\Entity\Court get($primaryKey, $options = [])
 * @method \App\Model\Entity\Court newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Court[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Court|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Court patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Court[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Court findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CourtsTable extends Table
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

        $this->table('courts');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('CourtTypes', [
            'foreignKey' => 'court_type_id'
        ]);
        $this->belongsTo('Facilities', [
            'foreignKey' => 'facility_id'
        ]);
        $this->hasMany('Frames', [
            'foreignKey' => 'court_id'
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
            ->allowEmpty('name');

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
        $rules->add($rules->existsIn(['court_type_id'], 'CourtTypes'));
        $rules->add($rules->existsIn(['facility_id'], 'Facilities'));

        return $rules;
    }
}
