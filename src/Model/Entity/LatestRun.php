<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LatestRun Entity
 *
 * @property int $id
 * @property int $location_interface_id
 * @property \Cake\I18n\FrozenTime|null $run_started
 * @property \Cake\I18n\FrozenTime|null $run_ended
 * @property string|null $ouput
 * @property string $status
 * @property int $location_id
 * @property string|null $interface_name
 * @property string|null $interface_path
 *
 * @property \App\Model\Entity\LocationInterface $location_interface
 * @property \App\Model\Entity\Location $location
 */
class LatestRun extends Entity
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
        'id' => true,
        'location_interface_id' => true,
        'run_started' => true,
        'run_ended' => true,
        'ouput' => true,
        'status' => true,
        'location_id' => true,
        'interface_name' => true,
        'interface_path' => true,
        'location_interface' => true,
        'location' => true,
    ];
}
