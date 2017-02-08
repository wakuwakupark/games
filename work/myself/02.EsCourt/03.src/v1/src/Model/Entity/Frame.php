<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Frame Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $deleted
 * @property \Cake\I18n\Time $start
 * @property int $reserved
 * @property int $end
 * @property int $court_id
 * @property int $price
 *
 * @property \App\Model\Entity\CourtType $court_type
 * @property \App\Model\Entity\Facility $facility
 * @property \App\Model\Entity\Queue[] $queues
 * @property \App\Model\Entity\Reserve[] $reserves
 */
class Frame extends Entity
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
