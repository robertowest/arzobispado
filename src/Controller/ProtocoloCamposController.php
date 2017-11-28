<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class ProtocoloCamposController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['index', 'view', 'add', 'edit', 'delete']);
    }

    public function isAuthorized($user)
    {
        return true;
    }

    public function index()
    {
        $this->paginate = ['contain' => ['ProtocoloTipo']];
        $registros = $this->paginate($this->ProtocoloCampos);

        // si viene del formulario de búsquedas modificamos el ResultSet
        if (!empty($this->request->data['search']))
        {
            $query = $this->request->data['search'];
            $conditions = array('conditions' => array('or' => array()));

            if ($query)
            {
                $conditions['conditions']['or'][$this->name.'.protocolo LIKE '] = "%$query%";
                $conditions['conditions']['or'][$this->name.'.campo LIKE '] = "%$query%";
            }

            $registros = $this->paginate($this->ProtocoloCampos->find('all', $conditions));
        }

        $this->set(compact('registros'));
        $this->set('_serialize', ['registros']);

        $this->set('subtitulo', '');
        $this->set('mensaje', 'Listado de campos según tipo de protocolo : búsqueda por protocolo o nombre');

        $this->render('/Comunes/index');
    }

    public function view($id = null)
    {
        $registro = $this->ProtocoloCampos->get($id, ['contain' => ['ProtocoloTipo', 
                                                                    'ProtocoloCampoContenido']]);

        $this->set('registro', $registro);
        $this->set('_serialize', ['registro']);

        $this->set('subtitulo', '(id : '.$registro->id.')');
        $this->render('view');

        $this->render('/Comunes/view');
    }

    public function add()
    {
        $registro = $this->ProtocoloCampos->newEntity();

        if ($this->request->is('post'))
        {
            //$registro = $this->ProtocoloCampos->patchEntity($registro, $this->request->data);
            $registro = $this->ProtocoloCampos->patchEntity($registro, $this->request->getData());

            if ($this->ProtocoloCampos->save($registro))
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
        $registro = $this->ProtocoloCampos->get($id, ['contain' => []]);

        if ($this->request->is(['patch', 'post', 'put']))
        {
            $registro = $this->ProtocoloCampos->patchEntity($registro, $this->request->getData());

            if ($this->ProtocoloCampos->save($registro))
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
        $registro = $this->ProtocoloCampos->get($id);

        if (!$this->ProtocoloCampos->delete($registro))
        {
            $this->Flash->error('El registro no pudo ser eliminado, intente nuevamente ...');
        }
        return $this->redirect(['action' => 'index']);
    }

    private function formulario($registro = null)
    {
        $protocoloTipo = $this->ProtocoloCampos->ProtocoloTipo
            ->find('list', ['keyField' => 'id', 'valueField' => 'path'])
            ->where(['parent_id IS NOT NULL']);

        $this->set(compact('registro', 'protocoloTipo'));
        $this->set('_serialize', ['registro']);

        if ($this->request->params['action'] == 'add')
        {
            $this->set('subtitulo', 'nuevo registro');
        }
        else
        {
            $this->set('subtitulo', 'modificar registro (Id: '.$registro->id.')');
        }
        $this->render('/Comunes/form');
    }     
}
