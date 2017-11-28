<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProtocoloCampo Entity
 *
 * @property int $id
 * @property int $protocolo_tipo_id
 * @property string $campo
 * @property string $tipo
 * @property string $active
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\ProtocoloTipo $protocolo_tipo
 * @property \App\Model\Entity\ProtocoloCampoContenido[] $protocolo_campo_contenido
 */
class ProtocoloCampo extends Entity
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

    protected function _getTipoTraducido()
    {
        switch ($this->tipo)
        {
            case 0:
                return 'Texto';
                break;
            case 1:
                return 'Número';
                break;
            case 2:
                return 'Fecha';
                break;
        }
    }
    protected function _getActiveTraducido()
    {
        switch ($this->active)
        { 
            case FALSE:
                return 'No'; 
                break;
            case TRUE:
                return 'Sí'; 
                break;
        }
    }
}
