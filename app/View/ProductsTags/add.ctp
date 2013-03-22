<div class="productsTags form">
<?php echo $this->Form->create('ProductsTag');?>
	<fieldset>
		<legend><?php echo __('Add Products Tag'); ?></legend>
	<?php
		echo $this->Form->input('product_id');
		echo $this->Form->input('tag_id');
	?>
	</fieldset>
<?php echo $this->Form->submit(__('Submit'));?>
<?php echo $this->Html->link(__('Cancel'), array('action' => 'index'));?>
<?php echo $this->Form->end();?>
</div>
<div class="actions">
	<?php echo $this->element('tr_menu'); ?></div>
