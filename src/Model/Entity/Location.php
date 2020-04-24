<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Location Entity
 *
 * @property int $id
 * @property string $name
 *
 * @property \App\Model\Entity\Country $country
 * @property \App\Model\Entity\LimeSurvey $lime_survey
 * @property \App\Model\Entity\ManagerUser $manager_user
 * @property \App\Model\Entity\City $city
 * @property \App\Model\Entity\Franchise $franchise
 * @property \App\Model\Entity\LocationType $location_type
 * @property \App\Model\Entity\IdauxCompany $idaux_company
 * @property \App\Model\Entity\Brand $brand
 * @property \App\Model\Entity\PayModel $pay_model
 * @property \App\Model\Entity\BusinessModel $business_model
 */
class Location extends Entity
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
        'name' => true,
        'country' => true,
        'lime_survey' => true,
        'manager_user' => true,
        'city' => true,
        'franchise' => true,
        'location_type' => true,
        'idaux_company' => true,
        'brand' => true,
        'pay_model' => true,
        'business_model' => true,
    ];
}
