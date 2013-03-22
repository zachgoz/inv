<?php
App::uses('AppModel', 'Model');
/**
 * Product Model
 *
 * @property Checkout $Checkout
 * @property Tag $Tag
 */
class Product extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */

	
   // Generate name for product when adding new ones or importing new products
	public function beforeSave($options = array()) {
	    // Get the type name
	    $subcategory = $this->Subcategory->field('name', array(
	        // Set the condition for the field
	        'Subcategory.id' => $this->data['Product']['subcategory_id']
	    ));

	    // Get the category name
	    $category = $this->Category->field('name', array(
	        // Set the condition for the field
	        'Category.id' => $this->data['Product']['category_id']
	    ));

	    // Generate the name based on type and category
	    $this->data['Product']['name'] = $category . " " . $subcategory . " " . "MAC:" . $this->data['Product']['mac'];

	    return true;
	}
	
	//public $validate = array(
		//'name' => array(
			//'notempty' => array(
				//'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			//),
		//),
	//);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Checkout' => array(
			'className' => 'Checkout',
			'foreignKey' => 'product_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


	public $belongsTo = array(
		'Subcategory' => array(
			'className' => 'Subcategory',
			'foreignKey' => 'subcategory_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Type' => array(
			'className' => 'Type',
			'foreignKey' => 'type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
}
