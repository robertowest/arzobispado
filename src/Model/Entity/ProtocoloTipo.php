<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Datasource\ConnectionManager;

use Cake\Log\Log;

/**
 * ProtocoloTipo Entity
 *
 * @property int $id
 * @property string $name
 * @property int $parent_id
 * @property string $active
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class ProtocoloTipo extends Entity
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

    protected function _getPath()
    {
        $conn = ConnectionManager::get('default');
        $data = $conn->query('SELECT GetPath('.$this->id.') AS result')->fetchAll('assoc');
        return $data[0]["result"];
    }

    /*
    protected function _getFirstLevel_old()
    {
        //Log::write('debug', 'getFirstElement');
        $conn = ConnectionManager::get('default');

        if ($this->parent_id == null)
        {
            return $this->name;
        }
        else
        {
            $parent_id = $this->parent_id;
            do {
                $data = $conn->query('SELECT id, name, parent_id FROM protocolo_tipo WHERE id = '.$parent_id)->fetchAll('assoc');
                
                if ($data[0]['parent_id'] == null)
                {
                    return $data[0]['name'];
                }

                $parent_id = $data[0]['parent_id'];

            } while ($parent_id <> null);
        }

        return 'n/a';
    }
    */

    protected function _getFirstLevel()
    {
        $conn = ConnectionManager::get('default');
        $data = $conn->query('SELECT GetFirstLevel('.$this->id.') AS result')->fetchAll('assoc');
        return $data[0]["result"];
    }
}
