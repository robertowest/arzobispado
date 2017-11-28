<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class BoletinController extends AppController
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
    }
}