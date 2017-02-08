<?php
namespace App\Controller;

use App\Controller\UsersAllowedController;

/**
 * Waits Controller
 *
 * @property \App\Model\Table\WaitsTable $Waits
 */
class WaitsController extends UsersAllowedController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Notifies', 'Facilities']
        ];
        $waits = $this->paginate($this->Waits);

        $this->set(compact('waits'));
        $this->set('_serialize', ['waits']);
    }

    /**
     * View method
     *
     * @param string|null $id Wait id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $wait = $this->Waits->get($id, [
            'contain' => ['Users', 'Notifies', 'Facilities', 'Reserveables']
        ]);

        $this->set('wait', $wait);
        $this->set('_serialize', ['wait']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $wait = $this->Waits->newEntity();
        if ($this->request->is('post')) {
            $wait = $this->Waits->patchEntity($wait, $this->request->data);
            if ($this->Waits->save($wait)) {
                $this->Flash->success(__('The wait has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The wait could not be saved. Please, try again.'));
        }
        $users = $this->Waits->Users->find('list', ['limit' => 200]);
        $notifies = $this->Waits->Notifies->find('list', ['limit' => 200]);
        $facilities = $this->Waits->Facilities->find('list', ['limit' => 200]);
        $this->set(compact('wait', 'users', 'notifies', 'facilities'));
        $this->set('_serialize', ['wait']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Wait id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $wait = $this->Waits->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $wait = $this->Waits->patchEntity($wait, $this->request->data);
            if ($this->Waits->save($wait)) {
                $this->Flash->success(__('The wait has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The wait could not be saved. Please, try again.'));
        }
        $users = $this->Waits->Users->find('list', ['limit' => 200]);
        $notifies = $this->Waits->Notifies->find('list', ['limit' => 200]);
        $facilities = $this->Waits->Facilities->find('list', ['limit' => 200]);
        $this->set(compact('wait', 'users', 'notifies', 'facilities'));
        $this->set('_serialize', ['wait']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Wait id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $wait = $this->Waits->get($id);
        if ($this->Waits->delete($wait)) {
            $this->Flash->success(__('The wait has been deleted.'));
        } else {
            $this->Flash->error(__('The wait could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
