<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LocationInterface Entity
 *
 * @property int $id
 * @property int|null $location_id
 * @property string|null $interface_name
 * @property string|null $interface_description
 * @property string|null $interface_path
 *
 * @property \App\Model\Entity\Location $location
 */
class LocationInterface extends Entity
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
        'location_id' => true,
        'interface_name' => true,
        'interface_description' => true,
        'interface_path' => true,
        'location' => true,
    ];
}
