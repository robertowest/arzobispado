<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class ProtocoloCampoContenidoController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        //$this->Auth->allow(['index', 'view', 'add', 'edit', 'delete']);
        $this->Auth->allow();
    }

    public function isAuthorized($user)
    {
        return true;
    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['ProtocoloCampos']
        ];
        $protocoloCampoContenido = $this->paginate($this->ProtocoloCampoContenido);

        $this->set(compact('protocoloCampoContenido'));
        $this->set('_serialize', ['protocoloCampoContenido']);
    }

    public function view($id = null)
    {
        $protocoloCampoContenido = $this->ProtocoloCampoContenido->get($id, [
            'contain' => ['ProtocoloCampos']
        ]);

        $this->set('protocoloCampoContenido', $protocoloCampoContenido);
        $this->set('_serialize', ['protocoloCampoContenido']);
    }

    public function add()
    {
        $protocoloCampoContenido = $this->ProtocoloCampoContenido->newEntity();
        if ($this->request->is('post')) {
            $protocoloCampoContenido = $this->ProtocoloCampoContenido->patchEntity($protocoloCampoContenido, $this->request->getData());
            if ($this->ProtocoloCampoContenido->save($protocoloCampoContenido)) {
                $this->Flash->success(__('The protocolo campo contenido has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The protocolo campo contenido could not be saved. Please, try again.'));
        }
        $protocoloCampos = $this->ProtocoloCampoContenido->ProtocoloCampos->find('list', ['limit' => 200]);
        $this->set(compact('protocoloCampoContenido', 'protocoloCampos'));
        $this->set('_serialize', ['protocoloCampoContenido']);
    }

    public function edit($id = null)
    {
        $protocoloCampoContenido = $this->ProtocoloCampoContenido->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $protocoloCampoContenido = $this->ProtocoloCampoContenido->patchEntity($protocoloCampoContenido, $this->request->getData());
            if ($this->ProtocoloCampoContenido->save($protocoloCampoContenido)) {
                $this->Flash->success(__('The protocolo campo contenido has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The protocolo campo contenido could not be saved. Please, try again.'));
        }
        $protocoloCampos = $this->ProtocoloCampoContenido->ProtocoloCampos->find('list', ['limit' => 200]);
        $this->set(compact('protocoloCampoContenido', 'protocoloCampos'));
        $this->set('_serialize', ['protocoloCampoContenido']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $protocoloCampoContenido = $this->ProtocoloCampoContenido->get($id);
        if ($this->ProtocoloCampoContenido->delete($protocoloCampoContenido)) {
            $this->Flash->success(__('The protocolo campo contenido has been deleted.'));
        } else {
            $this->Flash->error(__('The protocolo campo contenido could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
