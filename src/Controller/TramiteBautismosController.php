<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class TramiteBautismosController extends AppController
{
    public function beforeRender(Event $event)
    {    
        parent::beforeRender($event);

        // grabamos la url actual para poder regresar a ella
        $this->set('urlReferer', $this->request->referer());
    }    

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow();
    }

    public function isAuthorized($user)
    {
        return true;
    }

    public function index()
    {
        return $this->redirect(['controller'=>'protocolos', 'action' => 'index']);
    }

    public function add($protocolo_id = null)
    {
        $registro = $this->TramiteBautismos->newEntity();

        if ($this->request->is('get'))
        {
            // el protocolo se pasó desde el controlador asociado
            $registro->protocolo_id = $protocolo_id;
        }
        else
        {
            /*
            if (isset($this->request->data['interesado_fnacimiento'])) 
            {
                debug($this->request->data['interesado_fnacimiento']);
                $this->request->data['interesado_fnacimiento'] = date('y-m-d', strtotime($this->request->data['interesado_fnacimiento']));
            }
            */
            $registro = $this->TramiteBautismos->patchEntity($registro, $this->request->data);

            if ($this->TramiteBautismos->save($registro))
            {
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('El registro no pudo ser grabado, intente nuevamente ...');
            }
        }

        $parroquias = $this->TramiteBautismos->Instituciones
                        ->find('list')
                        ->Where(['es_parroquia' => 1])
                        ->order('descripcion');

        $this->set(compact('registro', 'parroquias'));
        $this->set('_serialize', ['registro']);

        $this->set('titulo', 'Rectificación/Reposición de Bautismo');
        $this->set('subtitulo', 'nuevo registro');
        $this->render('/Protocolos/Bautismos/form');
    }
    
    public function edit($id = null)
    {
        $registro = $this->TramiteBautismos->get($id, ['contain' => []]);

        if ($this->request->is(['patch', 'post', 'put']))
        {
            /*
            // si usamos fecha en formato de texto
            if (isset($this->request->data[interesado_fnacimiento]))
            {
                $fecha = $this->request->data[interesado_fnacimiento];
                $fecha = implode("-", array_reverse(explode("/", $fecha)));
                $fecha = date('y-m-d', strtotime($fecha));
                $this->request->data[interesado_fnacimiento] = $fecha;
            }
            */
            $registro = $this->TramiteBautismos->patchEntity($registro, $this->request->data);

            if ($this->TramiteBautismos->save($registro))
            {
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('El registro no pudo ser grabado, intente nuevamente ...');
            }
        }

        $parroquias = $this->TramiteBautismos->Instituciones
                        ->find('list')
                        ->Where(['es_parroquia' => 1])
                        ->order('descripcion');

        $this->set(compact('registro', 'parroquias'));
        $this->set('_serialize', ['registro']);

        $this->set('titulo', 'Rectificación/Reposición de Bautismo');
        $this->set('subtitulo', 'modificar registro (Id: '.$registro->id.')');
        $this->render('/Protocolos/Bautismos/form');
    }
}
