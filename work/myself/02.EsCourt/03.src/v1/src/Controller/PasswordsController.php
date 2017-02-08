<?php
namespace App\Controller;

use App\Controller\UsersAllowedController;

/**
 * Passwords Controller
 *
 * @property \App\Model\Table\PasswordsTable $Passwords
 */
class PasswordsController extends UsersAllowedController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Administrators']
        ];
        $passwords = $this->paginate($this->Passwords);

        $this->set(compact('passwords'));
        $this->set('_serialize', ['passwords']);
    }

    /**
     * View method
     *
     * @param string|null $id Password id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $password = $this->Passwords->get($id, [
            'contain' => ['Users', 'Administrators']
        ]);

        $this->set('password', $password);
        $this->set('_serialize', ['password']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $password = $this->Passwords->newEntity();
        if ($this->request->is('post')) {
            $password = $this->Passwords->patchEntity($password, $this->request->data);
            if ($this->Passwords->save($password)) {
                $this->Flash->success(__('The password has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The password could not be saved. Please, try again.'));
        }
        $users = $this->Passwords->Users->find('list', ['limit' => 200]);
        $administrators = $this->Passwords->Administrators->find('list', ['limit' => 200]);
        $this->set(compact('password', 'users', 'administrators'));
        $this->set('_serialize', ['password']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Password id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $password = $this->Passwords->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $password = $this->Passwords->patchEntity($password, $this->request->data);
            if ($this->Passwords->save($password)) {
                $this->Flash->success(__('The password has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The password could not be saved. Please, try again.'));
        }
        $users = $this->Passwords->Users->find('list', ['limit' => 200]);
        $administrators = $this->Passwords->Administrators->find('list', ['limit' => 200]);
        $this->set(compact('password', 'users', 'administrators'));
        $this->set('_serialize', ['password']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Password id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $password = $this->Passwords->get($id);
        if ($this->Passwords->delete($password)) {
            $this->Flash->success(__('The password has been deleted.'));
        } else {
            $this->Flash->error(__('The password could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
