 <script >
$(document).ready(function() {
	$('#ProductTypeId').change(function () {
	    var selectedItem = $(this).children('option:selected');
	    if (selectedItem.val() == '3') { // or $(this).attr('value')
			$('#hiddenfield').first().show("fast", function showNext() {
			$(this).next('#hiddenfield').show("fast", showNext);
			});
	    }
	    if (selectedItem.val() != '3') { // or $(this).attr('value')
			$('#hiddenfield').first().hide("fast", function hideNext() {
			$(this).next('#hiddenfield').hide("fast", hideNext);
			});
	    }
	});
});
 </script>
<div class="products form">
<?php echo $this->Form->create('Product');?>
	<fieldset>
		<legend><?php echo __('Edit Device'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('type_id');
		echo $this->Form->input('category_id', array('label' => 'Vendor'));
		echo $this->Form->input('subcategory_id', array('label' => 'Model'));
		echo $this->Form->input('location', array('label' => 'Location'));
		echo $this->Form->input('mac', array('label' => 'MAC/AssetTag'));
		echo $this->Form->input('description', array('label' => 'Notes'));
		echo $this->Form->input('cpu', array('div'=>array('id' => 'hiddenfield', 'style'=>'display:none;')));
		echo $this->Form->input('ram', array('div'=>array('id' => 'hiddenfield', 'style'=>'display:none;')));
		echo $this->Form->input('os', array('div'=>array('id' => 'hiddenfield', 'style'=>'display:none;')));
	?>
	</fieldset>
<?php echo $this->Form->submit(__('Submit'));?>
<?php echo $this->Html->link(__('Cancel'), array('action' => 'index'));?>
<?php echo $this->Form->end();?>
</div>
<div class="actions">
	<?php echo $this->element('tr_menu'); ?></div>

	<?php
	$this->Js->get('#ProductCategoryId')->event('change', 
		$this->Js->request(array(
			'controller'=>'subcategories',
			'action'=>'getByCategory'
			), array(
			'update'=>'#ProductSubcategoryId',
			'async' => true,
			'method' => 'post',
			'dataExpression'=>true,
			'data'=> $this->Js->serializeForm(array(
				'isForm' => true,
				'inline' => true
				))
			))
		);
	?>