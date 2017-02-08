<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Courts Controller
 *
 * @property \App\Model\Table\CourtsTable $Courts
 */
class CourtsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['CourtTypes', 'Facilities']
        ];
        $courts = $this->paginate($this->Courts);

        $this->set(compact('courts'));
        $this->set('_serialize', ['courts']);
    }

    /**
     * View method
     *
     * @param string|null $id Court id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $court = $this->Courts->get($id, [
            'contain' => ['CourtTypes', 'Facilities', 'Frames']
        ]);

        $this->set('court', $court);
        $this->set('_serialize', ['court']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $court = $this->Courts->newEntity();
        if ($this->request->is('post')) {
            $court = $this->Courts->patchEntity($court, $this->request->data);
            if ($this->Courts->save($court)) {
                $this->Flash->success(__('The court has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The court could not be saved. Please, try again.'));
        }
        $courtTypes = $this->Courts->CourtTypes->find('list', ['limit' => 200]);
        $facilities = $this->Courts->Facilities->find('list', ['limit' => 200]);
        $this->set(compact('court', 'courtTypes', 'facilities'));
        $this->set('_serialize', ['court']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Court id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $court = $this->Courts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $court = $this->Courts->patchEntity($court, $this->request->data);
            if ($this->Courts->save($court)) {
                $this->Flash->success(__('The court has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The court could not be saved. Please, try again.'));
        }
        $courtTypes = $this->Courts->CourtTypes->find('list', ['limit' => 200]);
        $facilities = $this->Courts->Facilities->find('list', ['limit' => 200]);
        $this->set(compact('court', 'courtTypes', 'facilities'));
        $this->set('_serialize', ['court']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Court id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $court = $this->Courts->get($id);
        if ($this->Courts->delete($court)) {
            $this->Flash->success(__('The court has been deleted.'));
        } else {
            $this->Flash->error(__('The court could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
