<?php
namespace App\Controller;

use App\Controller\AdministratorsAllowedController;

/**
 * Facilities Controller
 *
 * @property \App\Model\Table\FacilitiesTable $Facilities
 */
class FacilitiesController extends AdministratorsAllowedController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Administrators']
        ];
        $facilities = $this->paginate($this->Facilities);

        $this->set(compact('facilities'));
        $this->set('_serialize', ['facilities']);
    }

    /**
     * View method
     *
     * @param string|null $id Facility id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $facility = $this->Facilities->get($id, [
            'contain' => ['Administrators', 'FacilityImages', 'Frames', 'Waits']
        ]);

        $this->set('facility', $facility);
        $this->set('_serialize', ['facility']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $facility = $this->Facilities->newEntity();
        if ($this->request->is('post')) {
            $facility = $this->Facilities->patchEntity($facility, $this->request->data);
            if ($this->Facilities->save($facility)) {
                $this->Flash->success(__('The facility has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The facility could not be saved. Please, try again.'));
        }
        $administrators = $this->Facilities->Administrators->find('list', ['limit' => 200]);
        $this->set(compact('facility', 'administrators'));
        $this->set('_serialize', ['facility']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Facility id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $facility = $this->Facilities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $facility = $this->Facilities->patchEntity($facility, $this->request->data);
            if ($this->Facilities->save($facility)) {
                $this->Flash->success(__('The facility has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The facility could not be saved. Please, try again.'));
        }
        $administrators = $this->Facilities->Administrators->find('list', ['limit' => 200]);
        $this->set(compact('facility', 'administrators'));
        $this->set('_serialize', ['facility']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Facility id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $facility = $this->Facilities->get($id);
        if ($this->Facilities->delete($facility)) {
            $this->Flash->success(__('The facility has been deleted.'));
        } else {
            $this->Flash->error(__('The facility could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
