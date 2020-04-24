<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InterfacesRun Entity
 *
 * @property int $id
 * @property int $location_interface_id
 * @property \Cake\I18n\FrozenTime $run_started
 * @property \Cake\I18n\FrozenTime $run_ended
 * @property string $ouput
 *
 * @property \App\Model\Entity\LocationInterface $location_interface
 */
class InterfacesRun extends Entity
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
        'location_interface_id' => true,
        'run_started' => true,
        'run_ended' => true,
        'ouput' => true,
        'location_interface' => true,
    ];
}
