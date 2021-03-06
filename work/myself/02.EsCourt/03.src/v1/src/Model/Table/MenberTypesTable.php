<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MenberTypes Model
 *
 * @method \App\Model\Entity\MenberType get($primaryKey, $options = [])
 * @method \App\Model\Entity\MenberType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MenberType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MenberType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MenberType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MenberType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MenberType findOrCreate($search, callable $callback = null, $options = [])
 */
class MenberTypesTable extends Table
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

        $this->table('menber_types');
        $this->displayField('title');
        $this->primaryKey('id');
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
            ->allowEmpty('title');

        return $validator;
    }
}
