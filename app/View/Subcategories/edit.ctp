<div class="subcategories form">
<?php echo $this->Form->create('Subcategory'); ?>
	<fieldset>
		<legend><?php echo __('Edit Subcategory'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('category_id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

<!-- Sidebar Actions -->
<div class="actions">
<?php echo $this->element('tr_menu'); ?>
</div>
<!-- Sidebar Actions end -->