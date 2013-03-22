<?php
App::uses('AppController', 'Controller');
/**
 * Checkouts Controller
 *
 * @property Checkout $Checkout
 */
class CheckoutsController extends AppController {


    var $filters = array (  
            'index' => array (  
                'Checkout' => array (
                    'Checkout.name',  
                )  
            ),
            'archive' => array (  
                'Checkout' => array (
                    'Checkout.name',  
                )  
            )  
    );  

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->paginate = array(
		'conditions' => array('Checkout.end_time >= NOW()'),
		);
		$this->Checkout->recursive = 0;
		$this->set('checkouts', $this->paginate('Checkout'));
	}

	public function archive() {
		$this->paginate = array(
		'conditions' => array('Checkout.end_time < NOW()'),
		);
		$this->Checkout->recursive = 0;
		$this->set('checkouts', $this->paginate('Checkout'));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Checkout->id = $id;
		if (!$this->Checkout->exists()) {
			throw new NotFoundException(__('Invalid checkout'));
		}
		$this->set('checkout', $this->Checkout->read(null, $id));
		/* If users are in array, then add this ownership check */
		if (in_array("'users'", $compact)) {
		echo "/* TR: Authorization */
                \$currentUser = \$this->UserAuth->getUser();
                \$currentUserId = \$currentUser['User']['id'];
                \$ownerId = \$this->request->data['$currentModelName']['user_id'];
                \$isOwner = (\$currentUserId == \$ownerId);
                \$isAdmin = (\$currentUser['UserGroup']['id'] == 1);
                if (!(\$isOwner || \$isAdmin)) {
                        \$this->Session->setFlash(__('You do not have the permissions to edit this $currentModelName. Please ask the owner.'));
                        \$this->redirect(array('action' => 'index'));
                }";
		}
	}

/**
 * add method
 *
 * @return void
 */


	public function add($productId = null) {
	    if ($this->request->is('post')) {
	        $this->Checkout->create();
	        if ($this->Checkout->save($this->request->data)) {
	            $this->Session->setFlash(__('The checkout has been saved'));
	            $this->redirect(array('action' => 'index'));
	        } else {
	            $this->Session->setFlash(__('The checkout could not be saved. Please, try again.'));
	        }
	    } else {
	        $this->request->data['Checkout']['product_id'] = $productId;
	    }

	    $products = $this->Checkout->Product->find('list');
	    $users = $this->Checkout->User->find('list');
	    $this->set(compact('products', 'users'));

	}

    //CakePHP 2.0.x Compatible; it might not work on CakePHP 1.x.x
    public function multi($count = 1) {
        if($this->request->is('post')) {
            //$this->Checkout->saveAll($this->request->data['Checkout']);
            /* or if you want to do something on each record, you want to write like
            foreach($this->request->data['Model'] as $data){
                //Do not forget this line. you need to create new model for saving each time.
                $this->Model->create();
                $this->Model->save($data);
            }*/

            foreach($this->request->data['Checkout'] as $data) {
                //Do not forget this line. you need to create new model for saving each time.
                if ($this->request->isPost()) {
                    $this->Checkout->create();
                    $this->Checkout->save($data);
                } else {
                    $this->request->data['Checkout']['product_id'] = $productId;
                }

            }
            $this->redirect(array('action' => 'index'));
        }
        $products = $this->Checkout->Product->find('list');
        $users = $this->Checkout->User->find('list');
        $this->set(compact('products', 'users'));
        $this->set('count', $count);
    }
/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null, $type = null) {
		$this->Checkout->id = $id;
		if (!$this->Checkout->exists()) {
			throw new NotFoundException(__('Invalid checkout'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($type === 'copy') {
				unset($this->request->data['Checkout']['id']);
				$this->Checkout->create();
			}
			if ($this->Checkout->save($this->request->data)) {
				$this->Session->setFlash(__('The checkout has been saved'));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The checkout could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Checkout->read(null, $id);
		}
		$products = $this->Checkout->Product->find('list');
		$users = $this->Checkout->User->find('list');
		$this->set(compact('products', 'users'));
/* TR: Authorization */
                $currentUser = $this->UserAuth->getUser();
                $currentUserId = $currentUser['User']['id'];
                $ownerId = $this->request->data['Checkout']['user_id'];
                $isOwner = ($currentUserId == $ownerId);
                $isAdmin = ($currentUser['UserGroup']['id'] == 1);
                if (!($isOwner || $isAdmin)) {
                        $this->Session->setFlash(__('You do not have the permissions to edit this Checkout. Please ask the owner.'));
                        $this->redirect(array('action' => 'index'));
                }	}

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
		$this->Checkout->id = $id;
		if (!$this->Checkout->exists()) {
			throw new NotFoundException(__('Invalid checkout'));
		}
		if ($this->Checkout->delete()) {
			$this->Session->setFlash(__('Checkout deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Checkout was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}
