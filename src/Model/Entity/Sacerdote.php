<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Sacerdote extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    protected function _getNombreCompleto()
    {
        return $this->_properties['apellido'] . ', ' . $this->_properties['nombre'];
    }
}
