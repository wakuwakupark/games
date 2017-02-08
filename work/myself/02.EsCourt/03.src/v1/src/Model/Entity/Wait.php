<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Wait Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $deleted
 * @property int $user_id
 * @property int $notify_id
 * @property int $facility_id
 * @property float $central_latitude
 * @property float $central_longitude
 * @property int $distance
 * @property \Cake\I18n\Time $start
 * @property string $end
 * @property int $size
 * @property int $succession
 * @property int $must
 * @property int $max_price
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Notify $notify
 * @property \App\Model\Entity\Facility $facility
 * @property \App\Model\Entity\Reserveable[] $reserveables
 */
class Wait extends Entity
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
