<?php
App::uses('AppController', 'Controller');
/**
 * Types Controller
 *
 * @property Type $Type
 */
class TypesController extends AppController {
	
	public $helpers = array('Js');


    var $filters = array (  
            'view' => array (  
                'Type' => array (
                    'Product.name' => array('label' => 'Search Query'),
					'Category.name' => array  
	                		(	'type' => 'select',  
	                   			'selectOptions' => array  
	                    		(  'order' => 'Category.name ASC'  
	                        		/* other options too.. */ ),  
	                    		'required' => false,  
	                    		'label' => 'Type',  
	                    		'filterField' => 'Category.name' ),

                )
            )
    );
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Type->recursive = 0;
		$this->set('types', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Type->recursive = 2;
		if (!$this->Type->exists($id)) {
			throw new NotFoundException(__('Invalid type'));
		}
		$options = array('conditions' => array('Type.' . $this->Type->primaryKey => $id));
		$this->set('type', $this->Type->find('first', $options));
		$products = $this->Type->Product->find('list');
	    $this->set(compact('products'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Type->create();
			if ($this->Type->save($this->request->data)) {
				$this->Session->setFlash(__('The type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The type could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Type->exists($id)) {
			throw new NotFoundException(__('Invalid type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Type->save($this->request->data)) {
				$this->Session->setFlash(__('The type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Type.' . $this->Type->primaryKey => $id));
			$this->request->data = $this->Type->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Type->id = $id;
		if (!$this->Type->exists()) {
			throw new NotFoundException(__('Invalid type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Type->delete()) {
			$this->Session->setFlash(__('Type deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Type was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
