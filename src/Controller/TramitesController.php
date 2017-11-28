<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Filesystem\Folder;

/*

En un controlador escribimos un valor
$this->request->session()->write('uid', 'roberto west');

En otro controlador (o vista) leemos el valor
$this->request->session()->read('uid');

*/

class TramitesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Protocolos');
    }
    
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow();
        //$this->Auth->allow(['index', 'view', 'add', 'edit', 'delete']);
    }

    public function isAuthorized($user)
    {
        return true;
    }

    public function index()
    {
        $registros = $this->paginate($this->Protocolos, 
            ['contain' => ['ProtocoloTipo', 'ProtocoloDesignaciones', 'TramiteBautismos', 'Documents'],
             'conditions' => ['tipo_protocolo' => 'Trámites'],
             'order' => ['año DESC', 'protocolo DESC']
            ]);

        // si viene del formulario de búsquedas modificamos el ResultSet
        if (!empty($this->request->data['search']))
        {
            $query = $this->request->data['search'];
            $conditions = array('conditions' => array('or' => array()));

            if ($query)
            {
                $conditions['conditions']['or']['Protocolos.protocolo LIKE '] = "%$query%";
            }

            $registros = $this->paginate($this->Protocolos->find('all', $conditions));
        }

        $this->set(compact('registros'));
        $this->set('_serialize', ['registros']);

        $this->set('titulo', 'Trámites');
        $this->set('subtitulo', '');
        $this->set('mensaje', 'Listado de ' . $this->name . ' : búsqueda por número de protocolo');
        $this->render('/Comunes/index');
    }

    public function add()
    {
        $registro = $this->Protocolos->newEntity();
        $registro->año = date('Y');

        if ($this->request->is('post'))
        {
            $registro = $this->Protocolos->patchEntity($registro, $this->request->data);

            if ($this->Protocolos->save($registro))
            {
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('El registro no pudo ser grabado, intente nuevamente ...');
            }
        }

        $this->formulario($registro);
    }

    public function edit($id = null)
    {
        $registro = $this->Protocolos->get($id, ['contain' => ['ProtocoloTipo']]);

        if ($this->request->is(['patch', 'post', 'put']))
        {
            $registro = $this->Protocolos->patchEntity($registro, $this->request->data);

            if ($this->Protocolos->save($registro))
            {
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('El registro no pudo ser grabado, intente nuevamente ...');
            }
        }

        $this->formulario($registro);
    }

    private function formulario($registro = null)
    {
        $contadores = $this->contadores();
        $protocoloTipo = $this->Protocolos->ProtocoloTipo->GetAllowedListItem();

        $this->set(compact('registro', 'contadores', 'protocoloTipo'));
        $this->set('_serialize', 'registro');

        $this->set('titulo', 'Trámite');
        if ($this->request->params['action'] == 'add')
        {
            $this->set('subtitulo', 'nuevo registro');
        }
        else
        {
            $this->set('subtitulo', 'modificar registro (Id: '.$registro->id.')');
        }
        $this->render('/Protocolos/form');
    }

    private function contadores()
    {
        /*
        la idea es obtener los contadores de los elementos de primer nivel de los tipos
        de protocolos. Por ejemplo, en el caso de:
            1. Trámite/Bautismo/Certificado
            2. Trámite/Bautismo/Rectificaciones
            3. Trámite/Bautismo/Reposiciones
        nos interesa obtener un único contador para Trámite por lo que aguparemos por el
        elemento padre
        */

        // obtenemos los siguientes números de protocolos
        $contadores = $this->Protocolos->find('all', [
            'fields' => ['año'=>'Protocolos.año', 'tipo'=>'GetFirstLevel(ProtocoloTipo.id)', 'contador'=>'max(Protocolos.protocolo)+1'],
            'contain' => ['ProtocoloTipo'],
            'conditions' => ['Protocolos.año >=' => date('Y')-2],
            'group' => ['Protocolos.año', 'GetFirstLevel(ProtocoloTipo.id)'],
            'order' => 'Protocolos.año DESC'
        ]);
        return $contadores;
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $registro = $this->Protocolos->get($id);

        if ($this->Protocolos->delete($registro) == False)
        {
            $this->Flash->error('El registro no pudo ser eliminado, intente nuevamente ...');
        }
        return $this->redirect(['action' => 'index']);
    }

    public function view($id = null)
    {
        //$registro = $this->Protocolos->get($id, ['contain' => []]);
        // agregada para funcionar con Documents
        $registro = $this->Protocolos->get($id, ['contain' => ['ProtocoloTipo', 'Documents']]);

        $this->set('registro', $registro);
        $this->set('_serialize', ['registro']);
        
        $this->set('subtitulo', '(id : '.$registro->id.')');
        $this->render('/Comunes/view');
    }

    public function tipoFormulario($id = null, $parent_id = null)
    {
        $registro = $this->Protocolos->get($id);

        switch ($registro->protocolo_tipo_id)
        {
            case 2:
            case 3:
                // 2 - Trámites/Bautismos/Rectificaciones
                // 3 - Trámites/Bautismos/Reposiciones
                if ( is_null($parent_id) )
                    $this->redirect(['controller' => 'TramiteBautismos', 
                                     'action' => 'add', $id]);
                else
                    $this->redirect(['controller' => 'TramiteBautismos', 
                                     'action' => 'edit', $parent_id]);

                //$this->render('designaciones');
                break;

            case 8:
                // 8 - Protocolos/Sacerdotes/Designaciones
                if ( is_null($parent_id) )
                    $this->redirect(['controller' => 'ProtocoloDesignaciones', 
                                     'action' => 'add', $id]);
                else
                    $this->redirect(['controller' => 'ProtocoloDesignaciones', 
                                     'action' => 'edit', $parent_id]);

                //$this->render('designaciones');
                break;
        }
    }
}
