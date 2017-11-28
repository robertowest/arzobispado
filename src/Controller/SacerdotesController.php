<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class SacerdotesController extends AppController
{
    public $paginate = ['order' => ['Sacerdotes.nombreCompleto' => 'asc']];

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['index', 'view', 'add', 'edit', 'delete']);
        $this->Auth->allow('foja');
    }

    public function isAuthorized($user)
    {
        return true;
    }

    public function index()
    {
        //$this->paginate['limit'] = 5;  // para cambiar la cantidad de registro
        $registros = $this->paginate($this->Sacerdotes);

        // si viene del formulario de búsquedas modificamos el ResultSet
        if ( isset($this->request->data['search']) )
        {
            $query = $this->request->data['search'];
            $conditions = array('conditions' => array('or' => array()));

            if ($query)
            {
                $conditions['conditions']['or']['Sacerdotes.nombre LIKE '   ] = "%$query%";
                $conditions['conditions']['or']['Sacerdotes.apellido LIKE ' ] = "%$query%";
                $conditions['conditions']['or']['Sacerdotes.protocolo LIKE '] = "%$query%";
                // postgres
                //$conditions['conditions']['or']['translate(lower(Sacerdotes.apellido),"áéíóúñ","aeioun") LIKE '] = "%$query%";
                //$conditions['conditions']['or']['translate(lower(Sacerdotes.nombre)  ,"áéíóúñ","aeioun") LIKE '] = "%$query%";
            }

            $registros = $this->paginate($this->Sacerdotes->find('all', $conditions));
        }

        $this->set(compact('registros'));
        $this->set('_serialize', ['registros']);

        $this->set('subtitulo', '');
        $this->set('mensaje', 'Listado de Sacerdotes : búsqueda por nombre o protocolo');
        $this->render('/Comunes/index');
    }

    public function view($id = null)
    {
        $registro = $this->Sacerdotes->get($id, ['contain' => []]);

        $this->set('registro', $registro);
        $this->set('_serialize', ['registro']);

        $this->set('subtitulo', '(id : '.$registro->id.')');
        $this->render('/Comunes/view');
    }

    public function add()
    {
        $registro = $this->Sacerdotes->newEntity();

        if ($this->request->is('post'))
        {
            $registro = $this->Sacerdotes->patchEntity($registro, $this->request->data);

            if ($this->Sacerdotes->save($registro))
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
        $this->render('form');
    }

    public function edit($id = null)
    {
        $registro = $this->Sacerdotes->get($id, ['contain' => []]);

        if ($this->request->is(['patch', 'post', 'put']))
        {
            $registro = $this->Sacerdotes->patchEntity($registro, $this->request->data);

            if ($this->Sacerdotes->save($registro))
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
        $this->render('form');
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $registro = $this->Sacerdotes->get($id);

        if (!$this->Sacerdotes->delete($registro))
        {
            $this->Flash->error('El registro no pudo ser eliminado, intente nuevamente ...');
        }
        return $this->redirect(['action' => 'index']);
    }

    /*
    // llamada desde el controlador a un método de otro controlador
    public function foja($registro_id = null)
    {
        return $this->redirect(['controller' => 'Fojas', 'action' => 'foja', $registro_id]);
    }
    */
}
