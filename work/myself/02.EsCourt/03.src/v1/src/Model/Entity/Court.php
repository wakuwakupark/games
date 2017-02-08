<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Court Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $deleted
 * @property string $name
 * @property int $court_type_id
 * @property int $facility_id
 *
 * @property \App\Model\Entity\CourtType $court_type
 * @property \App\Model\Entity\Facility $facility
 * @property \App\Model\Entity\Frame[] $frames
 */
class Court extends Entity
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
}
