<div class="products view">
<h2><?php  echo __('Product');?></h2>
<div id="tr_indexview_actions">
	<div class="actions">
	<ul>	
		<li><?php echo $this->Html->link($this->Html->image('tr/Edit.png') . ' ' . __('Edit Product'), array('action' => 'edit', $product['Product']['id']), array('escape' => false)); ?></li>
		<li><?php echo $this->Html->link($this->Html->image('tr/Copy.png') . ' ' . __('Copy Product'), array('action' => 'edit', $product['Product']['id'], 'copy'), array('escape' => false)); ?></li>
		<li><?php echo $this->Form->postLink($this->Html->image('tr/Delete.png') . ' ' . __('Delete Product'), array('action' => 'delete', $product['Product']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?></li>
	</ul>
	</div>
</div>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($product['Product']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($product['Type']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vendor'); ?></dt>
		<dd>
			<?php echo h($product['Category']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Model'); ?></dt>
		<dd>
			<?php echo h($product['Subcategory']['name']); ?>
			&nbsp;
		</dd>		
		<dt><?php echo __('Location'); ?></dt>
		<dd>
			<?php echo h($product['Product']['location']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Asset Tag'); ?></dt>
		<dd>
			<?php echo h($product['Product']['sku']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Notes'); ?></dt>
		<dd>
			<?php echo h($product['Product']['description']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($product['Product']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($product['Product']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
<br/><br/>
<div class="related">
	<h3><?php echo __('Associated Checkouts');?></h3>
	<?php if (!empty($product['Checkout'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Start Time'); ?></th>
		<th><?php echo __('End Time'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($product['Checkout'] as $checkout): ?>
		<tr>
			<td><?php echo $checkout['id'];?></td>
			<td><?php echo $checkout['start_time'];?></td>
			<td><?php echo $checkout['end_time'];?></td>
			<td><?php echo $checkout['description'];?></td>
			<td><?php echo $checkout['created'];?></td>
			<td><?php echo $checkout['updated'];?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Checkout'), '/checkouts/add/' . $product['Product']['id']);?> </li>
		</ul>
	</div>
</div>
<br/><br/>
<!--
<div class="related">
	<h3><?php echo __('Associated Tags');?></h3>
	<?php if (!empty($product['Tag'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($product['Tag'] as $tag): ?>
		<tr>
			<td><?php echo $tag['id'];?></td>
			<td><?php echo $this->Html->link($tag['name'], array('controller' => 'tags', 'action' => 'view', $tag['id'])); ?></td>
			<td><?php echo $tag['description'];?></td>
			<td><?php echo $tag['created'];?></td>
			<td><?php echo $tag['updated'];?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Tag'), '/tags/add/product:' . $product['Product']['id']);?> </li>
		</ul>
	</div>
</div>
-->
</div>

<div class="actions">
	<?php echo $this->element('tr_menu'); ?></div>
