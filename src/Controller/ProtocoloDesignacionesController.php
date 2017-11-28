<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class ProtocoloDesignacionesController extends AppController
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
        $registro = $this->ProtocoloDesignaciones->newEntity();

        if ($this->request->is('get'))
        {
            // el protocolo se pasó desde el controlador asociado
            $registro->protocolo_id = $protocolo_id;
        }
        else
        {
            $registro = $this->ProtocoloDesignaciones->patchEntity($registro, $this->request->data);

            if ($this->ProtocoloDesignaciones->save($registro))
            {
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('El registro no pudo ser grabado, intente nuevamente ...');
            }
        }

        $sacerdotes = $this->ProtocoloDesignaciones->Sacerdotes->find('list', ['limit' => 200]);
        $funciones = $this->ProtocoloDesignaciones->Funciones->find('list', ['limit' => 200]);
        $instituciones = $this->ProtocoloDesignaciones->Instituciones->find('list', ['limit' => 200]);

        $this->set(compact('registro', 'sacerdotes', 'funciones', 'instituciones'));
        $this->set('_serialize', ['registro']);

        $this->set('titulo', 'Designación de Sacerdote');
        $this->set('subtitulo', 'nuevo registro');
        $this->render('/Protocolos/Designaciones/form');
    }

    public function edit($id = null)
    {
        $registro = $this->ProtocoloDesignaciones->get($id, ['contain' => []]);

        if ($this->request->is(['patch', 'post', 'put']))
        {
            $registro = $this->ProtocoloDesignaciones->patchEntity($registro, $this->request->data);

            if ($this->ProtocoloDesignaciones->save($registro))
            {
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('El registro no pudo ser grabado, intente nuevamente ...');
            }
        }
        else
        {
            $sacerdotes = $this->ProtocoloDesignaciones->Sacerdotes->find('list')
                                                  ->order('Sacerdotes.apellido')
                                                  ->order('Sacerdotes.nombre');

            $funciones = $this->ProtocoloDesignaciones->Funciones->find('list')
                                                ->order('Funciones.descripcion');

            $instituciones = $this->ProtocoloDesignaciones->Instituciones->find('list')
                                                        ->order('Instituciones.descripcion');
        }

        $this->set(compact('registro', 'sacerdotes', 'funciones', 'instituciones'));
        $this->set('_serialize', ['registro']);

        $this->set('titulo', 'Designación de Sacerdote');
        $this->set('subtitulo', 'modificar registro (Id: '.$registro->id.')');
        $this->render('/Protocolos/Designaciones/form');
    }

    /*
    public function index($sacerdote_id = null)
    {
        //$this->loadModel('ProtocoloDesignaciones');
        $this->paginate = [
                           'order' => ['Sacerdotes.apellido',
                                       'ProtocoloDesignaciones.falta',
                                       'ProtocoloDesignaciones.protocolo'],
                           'contain' => ['Protocolos', 'Sacerdotes', 
                                         'Funciones', 'Instituciones']
                          ];
        $registros = $this->paginate($this->ProtocoloDesignaciones);

        // si viene del formulario de búsquedas modificamos el ResultSet
        if ( isset($this->request->data['search']) )
        {
            $query = $this->request->data['search'];
            $conditions = array('conditions' => array('or' => array()));

            if ($query)
            {
                $conditions['conditions']['or']['Sacerdotes.apellido LIKE '] = "%$query%";
                $conditions['conditions']['or']['Sacerdotes.nombre LIKE '] = "%$query%";
                $conditions['conditions']['or']['ProtocoloDesignaciones.protocolo LIKE '] = "%$query%";
            }

            $registros = $this->paginate($this->ProtocoloDesignaciones->find('all', $conditions));
        }

        $this->set(compact('registros'));
        $this->set('_serialize', ['registros']);

        if ( strpos($this->request->url, '/sacerdote/') == 0 )
        {
            $this->set('titulo', 'ProtocoloDesignaciones');
            $this->set('subtitulo', '');
            $this->set('mensaje', 'Listado de ProtocoloDesignaciones : búsqueda por sacerdote o protocolo');
        }
        else
        {
            $this->set('titulo', 'ProtocoloDesignaciones de ' . $registros->first()->sacerdote->nombre_completo);
            $this->set('subtitulo', '');
            $this->set('mensaje', 'Listado de ProtocoloDesignaciones');
        }
    }

    public function view($id = null)
    {
        $registro = $this->ProtocoloDesignaciones->get($id, [
            'contain' => ['Protocolos', 'Sacerdotes', 'Funciones', 'Instituciones']
        ]);

        $this->set('registro', $registro);
        $this->set('_serialize', ['registro']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $registro = $this->ProtocoloDesignaciones->get($id);

        if (!$this->ProtocoloDesignaciones->delete($registro))
        {
            $this->Flash->error('El registro no pudo ser eliminado, intente nuevamente ...');
        }
        return $this->redirect(['action' => 'index']);
    }
    */
}
