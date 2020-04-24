<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LocationInterfaces Controller
 *
 * @property \App\Model\Table\LocationInterfacesTable $LocationInterfaces
 *
 * @method \App\Model\Entity\LocationInterface[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LocationInterfacesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {






        $bm = $this->LocationInterfaces->find('all');
        $this->set([
        'LocationInterfaces'=>$bm,
        '_serialize'=>['LocationInterfaces']
        ]);





    }

    /**
     * View method
     *
     * @param string|null $id Location Interface id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {





        $bm = $this->LocationInterfaces->find('all', array( "conditions"=> array("location_id ="=>$id)
        
        )
    
    
    );
        $this->set([
        'LocationInterfaces'=>$bm,
        '_serialize'=>['LocationInterfaces']
        ]);





    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $locationInterface = $this->LocationInterfaces->newEntity();
        if ($this->request->is('post')) {
            $locationInterface = $this->LocationInterfaces->patchEntity($locationInterface, $this->request->getData());
            if ($this->LocationInterfaces->save($locationInterface)) {
                $this->Flash->success(__('The location interface has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The location interface could not be saved. Please, try again.'));
        }
        $locations = $this->LocationInterfaces->Locations->find('list', ['limit' => 200]);
        $this->set(compact('locationInterface', 'locations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Location Interface id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $locationInterface = $this->LocationInterfaces->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $locationInterface = $this->LocationInterfaces->patchEntity($locationInterface, $this->request->getData());
            if ($this->LocationInterfaces->save($locationInterface)) {
                $this->Flash->success(__('The location interface has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The location interface could not be saved. Please, try again.'));
        }
        $locations = $this->LocationInterfaces->Locations->find('list', ['limit' => 200]);
        $this->set(compact('locationInterface', 'locations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Location Interface id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $locationInterface = $this->LocationInterfaces->get($id);
        if ($this->LocationInterfaces->delete($locationInterface)) {
            $this->Flash->success(__('The location interface has been deleted.'));
        } else {
            $this->Flash->error(__('The location interface could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
