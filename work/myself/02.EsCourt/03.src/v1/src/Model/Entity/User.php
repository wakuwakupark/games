<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $deleted
 * @property string $email
 * @property string $password
 * @property string $postcode
 * @property string $address
 * @property string $tel
 * @property string $family_name
 * @property string $first_name
 * @property \Cake\I18n\Time $birthday
 * @property int $member_type_id
 * @property int $gender
 * @property int $job_id
 *
 * @property \App\Model\Entity\MenberType $menber_type
 * @property \App\Model\Entity\Job $job
 * @property \App\Model\Entity\Password[] $passwords
 * @property \App\Model\Entity\Reserve[] $reserves
 * @property \App\Model\Entity\Wait[] $waits
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
