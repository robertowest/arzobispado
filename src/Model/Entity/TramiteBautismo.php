<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class TramiteBautismo extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
