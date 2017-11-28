<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class ProtocoloDesignacion extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
