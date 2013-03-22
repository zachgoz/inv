<?php
App::uses('AppController', 'Controller');
/**
 * ProductsTags Controller
 *
 * @property ProductsTag $ProductsTag
 */
class ProductsTagsController extends AppController {


    var $filters = array (  
            'index' => array (  
                'ProductsTag' => array (
                    'ProductsTag.name',  
                )  
            )  
    );  

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ProductsTag->recursive = 0;
		$this->set('productsTags', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ProductsTag->id = $id;
		if (!$this->ProductsTag->exists()) {
			throw new NotFoundException(__('Invalid products tag'));
		}
		$this->set('productsTag', $this->ProductsTag->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProductsTag->create();
			if ($this->ProductsTag->save($this->request->data)) {
				$this->Session->setFlash(__('The products tag has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The products tag could not be saved. Please, try again.'));
			}
		}
		$trparams = $this->params['named'];
		foreach ($trparams as $model=>$id) {
		        $this->request->data['ProductsTag'][$model . '_id'] = $id;
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null, $type = null) {
		$this->ProductsTag->id = $id;
		if (!$this->ProductsTag->exists()) {
			throw new NotFoundException(__('Invalid products tag'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($type === 'copy') {
				unset($this->request->data['ProductsTag']['id']);
				$this->ProductsTag->create();
			}
			if ($this->ProductsTag->save($this->request->data)) {
				$this->Session->setFlash(__('The products tag has been saved'));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The products tag could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ProductsTag->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->ProductsTag->id = $id;
		if (!$this->ProductsTag->exists()) {
			throw new NotFoundException(__('Invalid products tag'));
		}
		if ($this->ProductsTag->delete()) {
			$this->Session->setFlash(__('Products tag deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Products tag was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}
