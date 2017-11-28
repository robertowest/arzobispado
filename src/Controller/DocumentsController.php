<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Event\Event;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

/*
    http://www.naidim.org/cakephp-3-tutorial-12-file-uploads

    1: Create Documents table
    2: Create Documents Model
    3: Edit Users and Applications Tables
    4: Edit Users and Applications Controller
    5: Create Display and Links in Applications
    6: Create Documents Views
    7: Create Documents Controller

    El controlador debe
    Parámetros:
        $controller      Nombre del controlador que se asociará a este controlador
        $controller_id   Identificador de registro único (primary key) del controlador asociado

    IMPORTANTE:
    ===========
    La ruta de los archivos debe ser "directorio_del_sitio/webroot/files/" + "nuestra_ruta"
    La primera parte será: WWW_ROOT.'files'.DS
    La segunda parte corresponderá a la ruta que generemos según sea necesario
*/

class DocumentsController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow();
    }
    public function isAuthorized($user)
    {
        /*
        // Only Admin can add/edit documents
        if ($user['role'] == 'Admin')
        {
            return true;
        }
        return false;
        */
        return true;
    }

    public function index()
    {
        $this->autoRender = false;
        echo 'este controlador no tiene acción index' . '<br>';
        echo 'debe redireccionar hacia dónde sea necesario' . '<br>';
    }

    /*
        Para asociar un documento a un registro de otra tabla, se deberá pasar como 
        parámetro, el "nombre del controlador" y el "id" del mismo.

        $controller     Nombre del controlador (tabla) que se asociará al registro
        $controller_id  ID del registro que se asociará
    */
    public function add($controller = null, $controller_id = null)
    {
        if (is_null($controller_id))
        {
            // el documento no puede ser agregado sin la identificación del registro
            $this->redirect(['controller' => $controller, 'action' => 'index']);
        }

        // creamos un nuevo objeto Documents con valores por defecto
        $registro = $this->Documents->newEntity();
        $registro->name = 'Archivo Protocolar';

        if ($this->request->is('get'))
        {
            // valores por defecto para el nuevo registro
            $registro->controller = $controller;
            $registro->controller_id = $controller_id;
            $registro->user_id = 1;
            $registro->name = '';
        }
        elseif ($this->request->is('post'))
        {
            // recuperamos los datos cargados en el formulario
            $registro = $this->Documents->patchEntity($registro, $this->request->data);
            $file = $this->request->data['file'];

            // variables por defecto para el nombre y ruta del archivo
            $dataFile = $this->get_file_data($controller, $controller_id);
            $filename = $dataFile[0];
            $filepath = $dataFile[1];

            // asignamos los valores obtenidos al registro actual
            $registro->filename = $filename;
            $registro->filepath = str_replace(WWW_ROOT.'files'.DS, '', $filepath);

            // creamos el directorio si es necesario
            $path = $this->create_directory($filepath);

            // cargamos el archivo renombrandolo según su etiqueta
            if ( move_uploaded_file($file['tmp_name'], $path.DS.$registro->filename) )
            {
                if ($this->Documents->save($registro))
                {
                    $this->Flash->success(
                        'El archivo '.$filename.' fue grabado correctamente en: '.$filepath
                    );
                    return $this->redirect(['controller' => $controller, 'action' => 'view', $controller_id]);
                }
                else
                {
                    $this->Flash->error('El registro no pudo ser grabado, intente nuevamente ...');
                }
            }
            else
            {
                $this->Flash->error('El archivo no fue cargado');
            }
        }

        $this->set(compact('registro'));
        $this->set('_serialize', ['registro']);

        // URL de referencia
        if ( isset( $this->request->getServerParams()['HTTP_REFERER']) ) 
            $this->set('urlReferer', $this->request->getServerParams()['HTTP_REFERER']);
    }

    public function edit($id = null)
    {
        $registro = $this->Documents->get($id);

        if ($this->request->is(['patch', 'post', 'put']))
        {
            // si se definió un archivo, será necesario primero eliminar del servidor
            // el anterio para no dejar suciedad
            $file = $this->request->data['file'];

            if ($file['name'] != '')
            {
                if ( $this->delete_file($registro->filepath.DS.$registro->filename) )
                {
                    $dataFile = $this->get_file_data($registro->controller, $registro->controller_id);
                    $filename = $dataFile[0];
                    $filepath = $dataFile[1];

                    // después de subir el archivo, modificamos el valor recuperado
                    if ( move_uploaded_file($file['tmp_name'], $filepath.DS.$filename) )
                    {
                        $this->request->data['filename'] = $filename;
                    }

                    $registro = $this->Documents->patchEntity($registro, $this->request->data);
                    if ($this->Documents->save($registro))
                    {
                        return $this->redirect(['controller' => $registro->controller, 
                                                'action' => 'view', $registro->application_id]);
                    }
                    else
                    {
                        $this->Flash->error('El registro no pudo ser grabado, intente nuevamente ...');
                    }
                }
            }
        }

        $this->set(compact('registro'));
        $this->set('_serialize', ['registro']);

        // URL de referencia
        if ( isset( $this->request->getServerParams()['HTTP_REFERER']) ) 
            $this->set('urlReferer', $this->request->getServerParams()['HTTP_REFERER']);    
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $registro = $this->Documents->get($id);

        if ($this->Documents->delete($registro) == True)
        {
            // si el registro fue eliminado, intentamos eliminar también el archivo físico
            $filename = WWW_ROOT.'files'.DS.$registro->filepath.DS.$registro->filename;
            $file = new File($filename);
            if ( $file->delete() == False )
            {
                $this->Flash->error('El registro fue eliminado, pero el archivo físico '.
                                    $filename.' no pudo ser borrado.');
            }
        }
        else
        {
            $this->Flash->error('El registro no pudo ser eliminado, intente nuevamente ...');
        }

        // regresa a la URL pasada como parámetros
        if ( isset($this->request->query['urlback']) )
        {
            return $this->redirect(DS.$this->request->query['urlback']);
        }
        else
        {
            return $this->redirect(['action' => 'index']);
        }        
    }

    /*
        Obtenemos el nombre y ruta del archivo.

        Por defecto se almacenarán en :
        /var/www/html/arzolte/webroot/files/<nombre_del_controlador>

        Se modificará el nombre y ruta según el controlador que usemos, si utilizamos el 
        controlador 'Protocolos' el nombre del archivo será el correspondiente al año y 
        número de protocolo: YYYY-0000.xxx y la ruta será:
        /var/www/html/arzolte/webroot/files/<path_tipo_de_protocolo>/<año_protocolo>
    */
    private function get_file_data($controller = null, $controller_id = null)
    {
        // recuperamos los datos cargados en el formulario
        $file = $this->request->data['file'];

        // cargamos el modelo del controlador y obtenemos el registro relacionado
        $table = TableRegistry::get($controller);
        $entity = $table->get($controller_id);

        // valores según el controlador
        switch ($controller)
        {
            case 'Protocolos':
                // cargamos el modelo relacionado para obtener el path
                $modAux = $this->loadModel('ProtocoloTipo');
                $regAux = $modAux->get($entity->protocolo_tipo_id);
                $filename = $entity->año.'-'.str_pad($entity->protocolo, 4, '0', STR_PAD_LEFT).'.'.pathinfo($file['name'], PATHINFO_EXTENSION);
                $filepath = $regAux->path.DS.$entity->año;
                break;

            default:
                $filename = $file['name'];
                $filepath = $controller;
                break;
        }

        return [$filename, WWW_ROOT.'files'.DS.$filepath];
    }

    private function create_directory($path = null)
    {
        $folder = new Folder($path);
        if ( is_null($folder->path) )
        {
            $folder->create($path);
        }
        return $path;
    }

    private function delete_file($filename)
    {
        $filename = WWW_ROOT.'files'.DS.$filename;

        if ( file_exists($filename) )
        {
            $file = new File($filename);
            
            if ( $file->delete() == False )
            {
                $this->Flash->error('No se pudo eliminar el archivo '.$filename);
                return false;
            }
        }

        return true;
    }
}