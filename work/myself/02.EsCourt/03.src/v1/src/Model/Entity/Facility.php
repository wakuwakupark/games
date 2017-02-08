<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Facility Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $deleted
 * @property string $name
 * @property string $postcode
 * @property string $address
 * @property string $crawler_path
 * @property string $reserver_path
 * @property float $latitude
 * @property float $longitude
 * @property string $description
 * @property int $administrator_id
 *
 * @property \App\Model\Entity\Administrator $administrator
 * @property \App\Model\Entity\FacilityImage[] $facility_images
 * @property \App\Model\Entity\Frame[] $frames
 * @property \App\Model\Entity\Wait[] $waits
 */
class Facility extends Entity
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
