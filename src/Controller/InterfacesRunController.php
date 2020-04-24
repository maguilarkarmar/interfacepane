<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * InterfacesRun Controller
 *
 * @property \App\Model\Table\InterfacesRunTable $InterfacesRun
 *
 * @method \App\Model\Entity\InterfacesRun[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InterfacesRunController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {


       // $bm = $this->InterfacesRun->find('all');


	$query = $this->InterfacesRun->find('all', [
	"conditions" => ["status =" => "0" ]
	]


	);
        $this->set([
        'InterfacesRun'=>$query,
        '_serialize'=>['InterfacesRun']
        ]);

    }

    /**
     * View method
     *
     * @param string|null $id Interfaces Run id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
//	$this->autoRender = false;

       $query = $this->InterfacesRun->find('all', [
        "conditions" => ["status =" => "0",
         "location_id =" => $id 

		 ]
        ]


        );
        $this->set([
        'InterfacesRun'=>$query,
        '_serialize'=>['InterfacesRun']
        ]);


    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $this->log("metodo add","debug");

        $this->autoRender = false;

        $this->log($this->request->data,"debug");


       
        if ($this->request->is('post')) {


            $interfacesRun = $this->InterfacesRun->newEntity();

            $interfacesRunTable = TableRegistry::getTableLocator()->get('InterfacesRun');
            $interfacesRun = $interfacesRunTable->newEntity();

            $interfacesRun->location_interface_id             = 1;
            $interfacesRun->location_id                       = $this->request->data["sucursal"];
            $interfacesRun->interface_name                    = $this->request->data["nombre"];
            $interfacesRun->status                            = 0;
            $interfacesRun->ouput                             = "";

            $interfacesRun->interface_path                    = $this->request->data["descripcion"];

            if ($interfacesRunTable->save($interfacesRun)) {
                // The $article entity contains the id now
                $id = $interfacesRun->id;
                $this->log("ID: "+$id,"debug");

            }
                    
        }
        
    }

    /**
     * Edit method
     *
     * @param string|null $id Interfaces Run id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {

	$this->autoRender = false;
	//$this->log($this->request->getData()["output"],"debug");
	

	// Prior to 3.6 use TableRegistry::get('Articles')
	//$articlesTable = TableRegistry::get('InterfacesRun');
        $articlesTable = TableRegistry::getTableLocator()->get('InterfacesRun');

	$article = $articlesTable->get($id); // Return article with id 12

	$article->status = 1;
        $article->ouput = $this->request->getData()["output"];
	$articlesTable->save($article);



    }

    /**
     * Delete method
     *
     * @param string|null $id Interfaces Run id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $interfacesRun = $this->InterfacesRun->get($id);
        if ($this->InterfacesRun->delete($interfacesRun)) {
            $this->Flash->success(__('The interfaces run has been deleted.'));
        } else {
            $this->Flash->error(__('The interfaces run could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
