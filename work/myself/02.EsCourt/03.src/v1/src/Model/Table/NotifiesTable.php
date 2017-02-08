<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Notifies Model
 *
 * @property \Cake\ORM\Association\HasMany $Waits
 *
 * @method \App\Model\Entity\Notify get($primaryKey, $options = [])
 * @method \App\Model\Entity\Notify newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Notify[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Notify|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Notify patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Notify[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Notify findOrCreate($search, callable $callback = null, $options = [])
 */
class NotifiesTable extends Table
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

        $this->table('notifies');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Waits', [
            'foreignKey' => 'notify_id'
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
