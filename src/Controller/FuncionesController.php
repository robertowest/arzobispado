<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class FuncionesController extends AppController
{
    public $paginate = ['order' => ['Funciones.Descripcion' => 'asc']];

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
        $registros = $this->paginate($this->Funciones);

        // si viene del formulario de búsquedas modificamos el ResultSet
        if (!empty($this->request->data['search']))
        {
            $query = $this->request->data['search'];
            $conditions = array('conditions' => array('or' => array()));

            if ($query)
            {
                $conditions['conditions']['or']['Funciones.descripcion LIKE '   ] = "%$query%";
                // postgres
                //$conditions['conditions']['or']['translate(lower(Funciones.descripcion),"áéíóúñ","aeioun") LIKE '] = "%$query%";
            }

            $registros = $this->paginate($this->Funciones->find('all', $conditions));
        }

        $this->set(compact('registros'));
        $this->set('_serialize', ['registros']);

        $this->set('subtitulo', '');
        $this->set('mensaje', 'Listado de ' . $this->name . ' : búsqueda por descripción');
        $this->render('/Comunes/index');
    }

    public function view($id = null)
    {
        $registro = $this->Funciones->get($id, ['contain' => []]);

        $this->set('registro', $registro);
        $this->set('_serialize', ['registro']);

        $this->set('subtitulo', '(id : '.$registro->id.')');
        $this->render('/Comunes/view');
    }

    public function add()
    {
        $registro = $this->Funciones->newEntity();

        if ($this->request->is('post'))
        {
            $registro = $this->Funciones->patchEntity($registro, $this->request->data);

            if ($this->Funciones->save($registro))
            {
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('El registro no pudo ser grabado, intente nuevamente ...');
            }
        }
        $this->set(compact('registro'));
        $this->set('_serialize', ['registro']);

        $this->set('subtitulo', 'nuevo registro');
        $this->render('/Comunes/form');
    }

    public function edit($id = null)
    {
        $registro = $this->Funciones->get($id, ['contain' => []]);

        if ($this->request->is(['patch', 'post', 'put']))
        {
            $registro = $this->Funciones->patchEntity($registro, $this->request->data);

            if ($this->Funciones->save($registro))
            {
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('El registro no pudo ser grabado, intente nuevamente ...');
            }
        }
        $this->set(compact('registro'));
        $this->set('_serialize', ['registro']);

        $this->set('subtitulo', 'modificar registro (Id: '.$registro->id.')');
        $this->render('/Comunes/form');
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $registro = $this->Funciones->get($id);

        if (!$this->Funciones->delete($registro))
        {
            $this->Flash->error('El registro no pudo ser eliminado, intente nuevamente ...');
        }
        return $this->redirect(['action' => 'index']);
    }
}
