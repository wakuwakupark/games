<?php

namespace App\Controller;

use Cake\Controller\AppController;
use Cake\Event\Event;

class UsersAllowedController extends AppController
{
    public $components = [
        'Auth' => [
            'loginAction'=>[
                'controller'=>'Users',
                'action'=>'login'
            ],
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'view',
            ],

            'logoutRedirect' => [
                'controller' => 'Top',
                'action' => 'index',
            ],

            'authenticate' => [
                'Form' => [
                    'userModel' => 'Users',
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ],
                    'passwordHasher' => [
                        'className' => 'Default',
                    ]
                ]
            ],
        ]
    ];

    public function beforeFilter(Event $event){
        parent::beforeFilter($event);

        // Ajaxリクエスト時のみCsrfオフ
        $this->Auth->allow(['validate']);
        if($event->subject()->request->params['action'] == 'validate'){
            $this->eventManager()->off($this->Csrf);
        }
    }

    public function beforeRender(Event $event)
    {
        parent::beforeRender($event);

        //ユーザの認証情報
        $this->set('isAuth', $this->isAuthed());
        $this->set('authedId', $this->getAuthedUserId());
        $this->set('authedUser', $this->getAuthedUser());
    }

    protected function getAuthedUserId(){
        return $this->Auth->user()['id'];
    }

    protected function isAuthed(){
        if($this->getAuthedUserId() != null)
            return true;
        else
            return false;
    }

    protected function getAuthedUser(){
        $this->loadModel('Users');
        if($this->getAuthedType() != null){
            $user = $this->Users->get($this->getAuthedUserId());
            $this->set('self', $user);
            return $user;
        }else{
            return null;
        }
    }

}
