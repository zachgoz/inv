<div class="subcategories view">
<h2><?php  echo __('Subcategory'); ?></h2>

<!-- Top Actions -->
	<div id="tr_indexview_actions">
		<div class="actions">
		<ul>
			<li>
			<?php echo $this->Html->link($this->Html->image('tr/Edit.png') . " " . __('Edit'), array('action' => 'edit', $subcategory['Subcategory']['id']), array('escape' => false)); ?>
			</li>
			<li>
			<?php echo $this->Form->postLink($this->Html->image('tr/Delete.png') . ' ' . __('Delete Model'), array('action' => 'delete', $subcategory['Subcategory']['id']), array('escape' => false), __('Are you sure you want to delete %s?', $subcategory['Subcategory']['name'])); ?>
			</li>
		</ul>
		</div>
	</div>
<!-- Top Actions end -->

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($subcategory['Subcategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($subcategory['Category']['name'], array('controller' => 'categories', 'action' => 'view', $subcategory['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($subcategory['Subcategory']['name']); ?>
			&nbsp;
		</dd>
	</dl>
	
	<br><br>
	<div class="related">
		<h3><?php echo __('Related Products'); ?></h3>
		<?php if (!empty($subcategory['Product'])): ?>
		<table cellpadding = "0" cellspacing = "0">
		<tr>
			<th><?php echo __('Id'); ?></th>
			<th><?php echo __('Title'); ?></th>
			<th><?php echo __('Subcategory Id'); ?></th>
			<th><?php echo __('Category Id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php
			$i = 0;
			foreach ($subcategory['Product'] as $product): ?>
			<tr>
				<td><?php echo $product['id']; ?></td>
				<td><?php echo $product['name']; ?></td>
				<td><?php echo $product['subcategory_id']; ?></td>
				<td><?php echo $product['category_id']; ?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('controller' => 'products', 'action' => 'view', $product['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('controller' => 'products', 'action' => 'edit', $product['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'products', 'action' => 'delete', $product['id']), null, __('Are you sure you want to delete # %s?', $product['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php endif; ?>

		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
			</ul>
		</div>
	</div>
	
</div>

<!-- Sidebar Actions -->
<div class="actions">
<?php echo $this->element('tr_menu'); ?>
</div>
<!-- Sidebar Actions end -->


