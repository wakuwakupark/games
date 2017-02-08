<?php
namespace App\Controller;

use App\Controller\UsersAllowedController;

/**
 * Reserves Controller
 *
 * @property \App\Model\Table\ReservesTable $Reserves
 */
class ReservesController extends UsersAllowedController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Frames']
        ];
        $reserves = $this->paginate($this->Reserves);

        $this->set(compact('reserves'));
        $this->set('_serialize', ['reserves']);
    }

    /**
     * View method
     *
     * @param string|null $id Reserve id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reserve = $this->Reserves->get($id, [
            'contain' => ['Users', 'Frames']
        ]);

        $this->set('reserve', $reserve);
        $this->set('_serialize', ['reserve']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $reserve = $this->Reserves->newEntity();
        if ($this->request->is('post')) {
            $reserve = $this->Reserves->patchEntity($reserve, $this->request->data);
            if ($this->Reserves->save($reserve)) {
                $this->Flash->success(__('The reserve has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reserve could not be saved. Please, try again.'));
        }
        $users = $this->Reserves->Users->find('list', ['limit' => 200]);
        $frames = $this->Reserves->Frames->find('list', ['limit' => 200]);
        $this->set(compact('reserve', 'users', 'frames'));
        $this->set('_serialize', ['reserve']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Reserve id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reserve = $this->Reserves->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reserve = $this->Reserves->patchEntity($reserve, $this->request->data);
            if ($this->Reserves->save($reserve)) {
                $this->Flash->success(__('The reserve has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reserve could not be saved. Please, try again.'));
        }
        $users = $this->Reserves->Users->find('list', ['limit' => 200]);
        $frames = $this->Reserves->Frames->find('list', ['limit' => 200]);
        $this->set(compact('reserve', 'users', 'frames'));
        $this->set('_serialize', ['reserve']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Reserve id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reserve = $this->Reserves->get($id);
        if ($this->Reserves->delete($reserve)) {
            $this->Flash->success(__('The reserve has been deleted.'));
        } else {
            $this->Flash->error(__('The reserve could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
