<div class="subcategories index">
	<h2><?php echo __('Device Models'); ?></h2>
	
	<!--Top Actions -->
	<div id="tr_indexview_actions">
		<div class="actions">
		<ul>
			<li>
			<?php echo $this->Html->link($this->Html->image('tr/Add.png') . " " . __('New Model'), array('action' => 'add'), array('escape' => false)); ?>
			</li>
		</ul>
		</div>
	</div>
	<!--Top Actions end-->
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('category_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('Devices'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($subcategories as $subcategory): ?>
	<tr>
		<td><?php echo h($subcategory['Subcategory']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($subcategory['Category']['name'], array('controller' => 'categories', 'action' => 'view', $subcategory['Category']['id'])); ?>
		</td>
		<td><?php echo h($subcategory['Subcategory']['name']); ?>&nbsp;</td>
		<td><?php echo count($subcategory['Product']); //returns an integer ?></td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $subcategory['Subcategory']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $subcategory['Subcategory']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $subcategory['Subcategory']['id']), null, __('Are you sure you want to delete # %s?', $subcategory['Subcategory']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<!-- Sidebar Actions -->
<div class="actions">
<?php echo $this->element('tr_menu'); ?>
</div>
<!-- Sidebar Actions end -->