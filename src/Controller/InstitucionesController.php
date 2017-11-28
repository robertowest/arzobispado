<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class InstitucionesController extends AppController
{
    public $paginate = ['order' => ['Instituciones.Descripcion' => 'asc']];

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
        $registros = $this->paginate($this->Instituciones);

        // si viene del formulario de búsquedas modificamos el ResultSet
        if (!empty($this->request->data['search']))
        {
            $query = $this->request->data['search'];
            $conditions = array('conditions' => array('or' => array()));

            if ($query)
            {
                $conditions['conditions']['or']['Instituciones.descripcion LIKE '   ] = "%$query%";
                // postgres
                //$conditions['conditions']['or']['translate(lower(Instituciones.descripcion),"áéíóúñ","aeioun") LIKE '] = "%$query%";
            }

            $registros = $this->paginate($this->Instituciones->find('all', $conditions));
        }

        $this->set(compact('registros'));
        $this->set('_serialize', ['registros']);

        $this->set('subtitulo', '');
        $this->set('mensaje', 'Listado de ' . $this->name . ' : búsqueda por descripción');
        $this->render('/Comunes/index');
    }

    public function view($id = null)
    {
        $registro = $this->Instituciones->get($id, ['contain' => []]);

        $this->set('registro', $registro);
        $this->set('_serialize', ['registro']);

        $this->set('subtitulo', '(id : '.$registro->id.')');
        $this->render('/Comunes/view');
    }

    public function add()
    {
        $registro = $this->Instituciones->newEntity();

        if ($this->request->is('post'))
        {
            $registro = $this->Instituciones->patchEntity($registro, $this->request->data);

            if ($this->Instituciones->save($registro))
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
        $registro = $this->Instituciones->get($id, ['contain' => []]);

        if ($this->request->is(['patch', 'post', 'put']))
        {
            $registro = $this->Instituciones->patchEntity($registro, $this->request->data);

            if ($this->Instituciones->save($registro))
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
        $registro = $this->Instituciones->get($id);

        if (!$this->Instituciones->delete($registro))
        {
            $this->Flash->error('El registro no pudo ser eliminado, intente nuevamente ...');
        }
        return $this->redirect(['action' => 'index']);
    }
}
