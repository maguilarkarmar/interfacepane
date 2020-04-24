<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LatestRuns Controller
 *
 *
 * @method \App\Model\Entity\LatestRun[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LatestRunsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $bm = $this->LatestRuns->find('all');
        $this->set([
        'LatestRuns'=>$bm,
        '_serialize'=>['LatestRuns']
        ]);




    }

    /**
     * View method
     *
     * @param string|null $id Latest Run id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $latestRun = $this->LatestRuns->get($id, [
            'contain' => [],
        ]);

        $this->set('latestRun', $latestRun);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $latestRun = $this->LatestRuns->newEntity();
        if ($this->request->is('post')) {
            $latestRun = $this->LatestRuns->patchEntity($latestRun, $this->request->getData());
            if ($this->LatestRuns->save($latestRun)) {
                $this->Flash->success(__('The latest run has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The latest run could not be saved. Please, try again.'));
        }
        $this->set(compact('latestRun'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Latest Run id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $latestRun = $this->LatestRuns->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $latestRun = $this->LatestRuns->patchEntity($latestRun, $this->request->getData());
            if ($this->LatestRuns->save($latestRun)) {
                $this->Flash->success(__('The latest run has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The latest run could not be saved. Please, try again.'));
        }
        $this->set(compact('latestRun'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Latest Run id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $latestRun = $this->LatestRuns->get($id);
        if ($this->LatestRuns->delete($latestRun)) {
            $this->Flash->success(__('The latest run has been deleted.'));
        } else {
            $this->Flash->error(__('The latest run could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
