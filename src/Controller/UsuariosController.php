<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class UsuariosController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        // acciones del controlador permitidas sin inicio de sesion
        //$this->Auth->allow(['register', 'login', 'logout']);
        //$this->Auth->allow('edit');
        $this->Auth->allow(['add', 'edit', 'index', 'view', 'register', 'login', 'logout']);
    }

    public function isAuthorized($user)
    {
        // is_null($this->Auth->user('username'));
        if ( isset($user) )
        {
            // si el usuario es 'admin' tiene permiso total
            if (isset($user['rol']) && $user['rol'] === 'admin')
            {
                return true;
            }
            elseif (in_array( $this->request->getParam('action'), ['view', 'edit', 'delete'] ))
            //elseif ( $this->request->getParam('action') === 'view' )
            {
                return ( (int)$this->request->getParam('pass.0') === $user['id'] );
            }
        }

        return false;
    }

    public function index()
    {
        $registros = $this->paginate($this->Usuarios, ['order' => ['apellido', 'nombre']]);

        // si viene del formulario de búsquedas modificamos el ResultSet
        if (!empty($this->request->data['search']))
        {
            $query = $this->request->data['search'];
            $conditions = array('conditions' => array('or' => array()));

            if ($query)
            {
                $conditions['conditions']['or']['Usuarios.nombre LIKE '] = "%$query%";
                $conditions['conditions']['or']['Usuarios.apellido LIKE '] = "%$query%";
                $conditions['conditions']['or']['Usuarios.username LIKE '] = "%$query%";
                // postgres
                //$conditions['conditions']['or']['translate(lower(Sacerdotes.apellido),"áéíóúñ","aeioun") LIKE '] = "%$query%";
                //$conditions['conditions']['or']['translate(lower(Sacerdotes.nombre)  ,"áéíóúñ","aeioun") LIKE '] = "%$query%";
            }

            $registros = $this->paginate($this->Usuarios->find('all', $conditions));
        }

        $this->set(compact('registros'));
        $this->set('_serialize', ['registros']);

        $this->set('subtitulo', '');
        $this->set('mensaje', 'Listado de ' . $this->name . ' : búsqueda por nombre, apellido y usuario');
        $this->render('/Comunes/index');
    }

    public function view($id = null)
    {
        $registro = $this->Usuarios->get($id, ['contain' => []]);

        $this->set('registro', $registro);
        $this->set('_serialize', ['registro']);

        $this->set('subtitulo', '(id : '.$registro->id.')');
        $this->render('/Comunes/view');
    }

    public function add()
    {
        $registro = $this->Usuarios->newEntity();

        if ($this->request->is('post'))
        {
            $registro = $this->Usuarios->patchEntity($registro, $this->request->data);

            if ($this->Usuarios->save($registro))
            {
                $this->Flash->success('El registro fue grabado correctamente.');
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
        $registro = $this->Usuarios->get($id, ['contain' => []]);

        if ($this->request->is(['patch', 'post', 'put']))
        {
            $registro = $this->Usuarios->patchEntity($registro, $this->request->data);

            if ($this->Usuarios->save($registro))
            {
                $this->Flash->success('El registro fue grabado correctamente.');
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
        $registro = $this->Usuarios->get($id);

        if ($this->Usuarios->delete($registro))
        {
            $this->Flash->success('El registro fue eliminado correctamente.');
        }
        else
        {
            $this->Flash->error('El registro no pudo ser eliminado, intente nuevamente ...');
        }
        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        if ($this->request->is('post'))
        {
            $registro = $this->Auth->identify();

            if ($registro)
            {
                $this->Auth->setUser($registro);
                return $this->redirect($this->Auth->redirectUrl());
            }
            else
            {
                $this->Flash->error('Los datos de inicio son incorrectos.', ['key'=>'auth']);
            }
        }
    }

    public function logout()
    {
        /*
        $this->Flash->set('mensaje de usuario');
        $this->Flash->success('mensaje positivo');
        $this->Flash->error('mensaje de error');
        $this->Flash->warning('mensaje de precaución');
        $this->Flash->info('mensaje de información');
        */

        $this->Auth->logout();
        $this->set('current_user', null);
        //return $this->redirect($this->Auth->logout());
        //return $this->redirect(['controller' => 'pages', 'action' => 'display']);
        $this->render();
    }

    public function register()
    {
        $registro = $this->Usuarios->newEntity();

        if ($this->request->is('post'))
        {
            $registro = $this->Usuarios->patchEntity($registro, $this->request->data);

            if ($this->Usuarios->save($registro))
            {
                $this->Flash->success('El registro fue grabado correctamente.');
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('El registro no pudo ser guardado, intente nuevamente ...');
            }
        }
        $this->set(compact('registro'));
        $this->set('_serialize', ['registro']);
    }

    public function profile($id = null)
    {
        //$registro = $this->Usuarios->get($id, ['contain' => []]);
        $registro = $this->Usuarios->get($id);

        $this->set(compact('registro'));
        $this->set('_serialize', ['registro']);
    }
}
