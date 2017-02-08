<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Masters Model
 *
 * @property \Cake\ORM\Association\BelongsTo $MenberTypes
 *
 * @method \App\Model\Entity\Master get($primaryKey, $options = [])
 * @method \App\Model\Entity\Master newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Master[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Master|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Master patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Master[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Master findOrCreate($search, callable $callback = null, $options = [])
 */
class MastersTable extends Table
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

        $this->table('masters');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('MenberTypes', [
            'foreignKey' => 'member_type_id'
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
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->allowEmpty('password');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['member_type_id'], 'MenberTypes'));

        return $rules;
    }
}
