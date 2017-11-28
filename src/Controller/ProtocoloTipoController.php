<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * ProtocoloTipo Controller
 *
 * @property \App\Model\Table\ProtocoloTipoTable $ProtocoloTipo
 */
class ProtocoloTipoController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow();
    }

    public function index()
    {
        $this->paginate = ['contain' => ['ParentProtocoloTipo'],
                           'order' => ['ProtocoloTipo.parent_id',
                                       'ProtocoloTipo.name'],
                          ];
        $registros = $this->paginate($this->ProtocoloTipo);

        // si viene del formulario de búsquedas modificamos el ResultSet
        if (!empty($this->request->data['search']))
        {
            $query = $this->request->data['search'];
            $conditions = array('conditions' => array('or' => array()));

            if ($query)
            {
                $conditions['conditions']['or']['ProtocoloTipo.name LIKE '   ] = "%$query%";
                // postgres
                //$conditions['conditions']['or']['translate(lower(ProtocoloTipo.name),"áéíóúñ","aeioun") LIKE '] = "%$query%";
            }

            $registros = $this->paginate($this->ProtocoloTipo->find('all', $conditions));
        }

        $this->set(compact('registros'));
        $this->set('_serialize', ['registros']);

        $this->set('subtitulo', '');
        $this->set('mensaje', 'Listado de tipos de protocolos : búsqueda por descripción');
    }

    public function view($id = null)
    {
        $registro = $this->ProtocoloTipo->get($id, ['contain' => ['ParentProtocoloTipo', 'ChildProtocoloTipo']]);

        $this->set('registro', $registro);
        $this->set('_serialize', ['registro']);

        $this->set('subtitulo', '(id : '.$registro->id.')');
        $this->render('view');
    }

    public function add()
    {
        $registro = $this->ProtocoloTipo->newEntity();

        if ($this->request->is('post'))
        {
            $registro = $this->ProtocoloTipo->patchEntity($registro, $this->request->data);

            if ($this->ProtocoloTipo->save($registro))
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
        $registro = $this->ProtocoloTipo->get($id, ['contain' => []]);

        if ($this->request->is(['patch', 'post', 'put']))
        {
            $registro = $this->ProtocoloTipo->patchEntity($registro, $this->request->data);

            if ($this->ProtocoloTipo->save($registro))
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

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $registro = $this->ProtocoloTipo->get($id);

        if (!$this->ProtocoloTipo->delete($registro))
        {
            $this->Flash->error('El registro no pudo ser eliminado, intente nuevamente ...');
        }
        return $this->redirect(['action' => 'index']);
    }

    private function formulario($registro = null)
    {
        $parent = $this->ProtocoloTipo
            ->find('list', ['keyField' => 'id', 'valueField' => 'path'])
            ->where(['parent_id IS NOT NULL']);

        $this->set(compact('registro', 'parent'));
        $this->set('_serialize', ['registro']);

        if ($this->request->params['action'] == 'add')
        {
            $this->set('subtitulo', 'nuevo registro');
        }
        else
        {
            $this->set('subtitulo', 'modificar registro (Id: '.$registro->id.')');
        }
        $this->render('form');
    }    
}
