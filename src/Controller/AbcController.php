<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class AbcController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow();
    }
    public function isAuthorized($user)
    {
        return true;
    }

    public function index()
    {
        $this->autoRender = false;
        echo '¡ Hola mundo !' . '<br>';
    }

    public function pagina1()
    {}

    public function pagina2()
    {
        debug($this);
    }

    public function pagina3()
    {}
}