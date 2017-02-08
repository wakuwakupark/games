<?php
namespace App\Controller;

use App\Controller\AdministratorsAllowedController;

/**
 * Frames Controller
 *
 * @property \App\Model\Table\FramesTable $Frames
 */
class FramesController extends AdministratorsAllowedController
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
        $frames = $this->paginate($this->Frames);

        $this->set(compact('frames'));
        $this->set('_serialize', ['frames']);
    }

    /**
     * View method
     *
     * @param string|null $id Frame id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $frame = $this->Frames->get($id, [
            'contain' => ['CourtTypes', 'Facilities', 'Queues', 'Reserves']
        ]);

        $this->set('frame', $frame);
        $this->set('_serialize', ['frame']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $frame = $this->Frames->newEntity();
        if ($this->request->is('post')) {
            $frame = $this->Frames->patchEntity($frame, $this->request->data);
            if ($this->Frames->save($frame)) {
                $this->Flash->success(__('The frame has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The frame could not be saved. Please, try again.'));
        }
        $courtTypes = $this->Frames->CourtTypes->find('list', ['limit' => 200]);
        $facilities = $this->Frames->Facilities->find('list', ['limit' => 200]);
        $this->set(compact('frame', 'courtTypes', 'facilities'));
        $this->set('_serialize', ['frame']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Frame id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $frame = $this->Frames->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $frame = $this->Frames->patchEntity($frame, $this->request->data);
            if ($this->Frames->save($frame)) {
                $this->Flash->success(__('The frame has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The frame could not be saved. Please, try again.'));
        }
        $courtTypes = $this->Frames->CourtTypes->find('list', ['limit' => 200]);
        $facilities = $this->Frames->Facilities->find('list', ['limit' => 200]);
        $this->set(compact('frame', 'courtTypes', 'facilities'));
        $this->set('_serialize', ['frame']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Frame id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $frame = $this->Frames->get($id);
        if ($this->Frames->delete($frame)) {
            $this->Flash->success(__('The frame has been deleted.'));
        } else {
            $this->Flash->error(__('The frame could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
