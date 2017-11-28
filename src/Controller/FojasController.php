<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class FojasController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['index', 'view', 'add', 'edit', 'delete']);
        $this->Auth->allow(['sacerdote', 'attach']);
    }

    public function isAuthorized($user)
    {
        return true;
    }

    public function index($sacerdote_id = null)
    {
        //$this->loadModel('Fojas');
        $this->paginate = [
                           'order' => ['Sacerdotes.apellido',
                                       'Fojas.falta',
                                       'Fojas.protocolo'],
                           'contain' => ['Sacerdotes', 'Funciones', 'Instituciones']
                          ];
        $registros = $this->paginate($this->Fojas);

        // si viene del formulario de búsquedas modificamos el ResultSet
        if ( isset($this->request->data['search']) )
        {
            $query = $this->request->data['search'];
            $conditions = array('conditions' => array('or' => array()));

            if ($query)
            {
                $conditions['conditions']['or']['Sacerdotes.apellido LIKE '] = "%$query%";
                $conditions['conditions']['or']['Sacerdotes.nombre LIKE '] = "%$query%";
                $conditions['conditions']['or']['Fojas.protocolo LIKE '] = "%$query%";
            }

            $registros = $this->paginate($this->Fojas->find('all', $conditions));
        }

        $this->set(compact('registros'));
        $this->set('_serialize', ['registros']);

        if ( strpos($this->request->url, '/sacerdote/') == 0 )
        {
            $this->set('titulo', 'Fojas');
            $this->set('subtitulo', '');
            $this->set('mensaje', 'Listado de Fojas : búsqueda por sacerdote o protocolo');
        }
        else
        {
            $this->set('titulo', 'Fojas de ' . $registros->first()->sacerdote->nombre_completo);
            $this->set('subtitulo', '');
            $this->set('mensaje', 'Listado de Fojas');
        }
    }

    public function view($id = null)
    {
        $registro = $this->Fojas->get($id, ['contain' => []]);

        $this->set('registro', $registro);
        $this->set('_serialize', ['registro']);
    }

    public function add()
    {
        $registro = $this->Fojas->newEntity();

        if ($this->request->is('post'))
        {
            $registro = $this->Fojas->patchEntity($registro, $this->request->data);

            if ($this->Fojas->save($registro))
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
        $registro = $this->Fojas->get($id, ['contain' => []]);

        if ($this->request->is(['patch', 'post', 'put']))
        {
            $registro = $this->Fojas->patchEntity($registro, $this->request->data);

            if ($this->Fojas->save($registro))
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
            $sacerdotes = $this->Fojas->Sacerdotes->find('list')
                                                  ->order('Sacerdotes.apellido')
                                                  ->order('Sacerdotes.nombre');

            $funciones = $this->Fojas->Funciones->find('list')
                                                ->order('Funciones.descripcion');

            $instituciones = $this->Fojas->Instituciones->find('list')
                                                        ->order('Instituciones.descripcion');

            $this->filtro($sacerdotes, $funciones, $instituciones);
        }

        $this->set(compact('registro', 'funciones', 'sacerdotes', 'instituciones'));
        $this->set('_serialize', ['registro']);

        $this->set('subtitulo', 'modificar registro (Id: '.$registro->id.')');
        $this->render('/Comunes/form');
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $registro = $this->Fojas->get($id);

        if (!$this->Fojas->delete($registro))
        {
            $this->Flash->error('El registro no pudo ser eliminado, intente nuevamente ...');
        }
        return $this->redirect(['action' => 'index']);
    }

    public function sacerdote($sacerdote_id = null)
    {
        if($sacerdote_id == NULL)
        {
            $sacerdote_id = 1;
        }

        // carga el modelo Funcion_Sacerdote_Institucion
        //$this->loadModel('Fojas');
        $query = $this->Fojas->findBySacerdoteId($sacerdote_id);
        $query->order(['Fojas.falta', 'Fojas.protocolo']);
        $query->contain(['Funciones', 'Instituciones', 'Sacerdotes']);

        $this->paginate = ['contain' => ['Funciones', 'Sacerdotes', 'Instituciones']];
        $registros = $this->paginate($query);

        if ( $registros->isEmpty() )
        {
            return $this->redirect(['action' => 'add']);
        }
        else
        {
            $this->set('registros', $registros);
            $this->set('_serialize', ['registros']);
        }

        // ejecuta una plantilla determinada
        $this->render('/Fojas/index');
    }

    private function filtro($sacerdotes = null, $funciones = null, $instituciones = null)
    {
        if ($this->request->query)
        {
            if ($this->request->query['filtro1'])
            {
                if ( $this->driverConnect() === 'Cake\Database\Driver\Postgres' )
                {
                    $sacerdotes->where(["lower(translate(Sacerdotes.apellido,'áéíóúñ','aeioun')) LIKE "
                        => '%'.$this->postgresNormalize($this->request->query['filtro1']).'%']);
                }
                else
                {
                    $sacerdotes->where(['Sacerdotes.apellido LIKE ' => '%'.$this->request->query['filtro1'].'%']);
                }
            }

            if ($this->request->query['filtro2'])
            {
                if ( $this->driverConnect() === 'Cake\Database\Driver\Postgres' )
                {
                    $funciones->where(["lower(translate(Funciones.descripcion,'áéíóúñ','aeioun')) LIKE "
                        => '%'.$this->postgresNormalize($this->request->query['filtro2']).'%']);
                }
                else
                {
                    $funciones->where(['Funciones.descripcion LIKE ' => '%'.$this->request->query['filtro2'].'%']);
                }
            }

            if ($this->request->query['filtro3'])
            {
                if ( $this->driverConnect() === 'Cake\Database\Driver\Postgres' )
                {
                    $instituciones->where(["lower(translate(Instituciones.descripcion,'áéíóúñ','aeioun')) LIKE "
                        => '%'.$this->postgresNormalize($this->request->query['filtro3']).'%']);
                }
                else
                {
                    $instituciones->where(['Instituciones.descripcion LIKE ' => '%'.$this->request->query['filtro3'].'%']);
                }
            }
        }
    }

    public function attach($id = null)
    {
        /*
        para que funcione tuve que comentar la linea 'file_dir' => false de
        /var/www/html/arzobispado/src/Model/Entity/Foja.php
        */

        $registro = $this->Fojas->get($id, ['contain' => ['Funciones', 'Sacerdotes', 'Instituciones']]);
        $sacerdote_id = $registro->sacerdote_i;

        if ($this->request->is(['patch', 'post', 'put']))
        {
            $registro = $this->Fojas->patchEntity($registro, $this->request->getData());

            if ($this->Fojas->save($registro))
            {
                // si existe redirect lo usamos
                if (isset($this->request->data['redirect']))
                {
                    return $this->redirect($this->request->data['redirect']);
                }
                else
                {
                    return $this->redirect(['action' => 'index', $sacerdote_id]);
                }
            }
            else
            {
                $this->Flash->error('Error en la grabación. Intente nuevamente.');
            }
        }
        else
        {
            // metodo GET
            // grabamos la referencia de la página para poder regresar a ella
            $this->set('redirect', $this->referer());
        }

        //$funciones = $this->Fojas->Funciones->find('list', ['limit' => 5]);
        //$sacerdotes = $this->Fojas->Sacerdotes->find('list', ['limit' => 5]);
        //$instituciones = $this->Fojas->Instituciones->find('list', ['limit' => 5]);

        $this->set(compact('registro', 'funciones', 'sacerdotes', 'instituciones'));
        $this->set('_serialize', ['registro']);

        if (empty($registro->file_name))
        {
            $this->render('/Fojas/attach_add');
        }
        else
        {
            $this->render('/Fojas/attach_edit');
        }
    }

    private function attachAdd($id = null)
    {
        $this->attach($id);
        //$this->render('/Fojas/index');
    }

    private function attachEdit($id = null)
    {
        $this->attach($id);
        //$this->render('/Fojas/attach_edit');
    }
}
