<div class="checkouts form">
<?php echo $this->Form->create('Checkout');?>
	<fieldset>
		<legend><?php echo __('Add Checkout'); ?></legend>

	<?php
		echo $this->Form->input('product_id');
		echo $this->Form->input('start_time');
		echo $this->Form->input('end_time');
		echo $this->Form->input('user_id');
		echo $this->Form->input('description', array('label' => 'Notes'));
	?>
	</fieldset>
<?php echo $this->Form->submit(__('Submit'));?>
<?php echo $this->Html->link(__('Cancel'), array('action' => 'index'));?>
<?php echo $this->Form->end();?>
</div>
<div class="actions">
	<?php echo $this->element('tr_menu'); ?></div>
