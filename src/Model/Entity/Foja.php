<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class FuncionSacerdoteInstitucion extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
        //'file_dir' => false
    ];
}
