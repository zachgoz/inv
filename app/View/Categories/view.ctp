<div class="categories view">
<h2><?php  echo __('Vendor Info'); ?></h2>

<div id="tr_indexview_actions">
	<div class="actions">
	<ul>
		<li>
		<?php echo $this->Html->link($this->Html->image('tr/Edit.png') . " " . __('Edit'), array('action' => 'edit', $category['Category']['id']), array('escape' => false)); ?>
		</li>
		<li>
		<?php echo $this->Form->postLink($this->Html->image('tr/Delete.png') . ' ' . __('Delete Category'), array('action' => 'delete', $category['Category']['id']), array('escape' => false), __('Are you sure you want to delete %s?', $category['Category']['name'])); ?>
		</li>
	</ul>
	</div>
</div>

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($category['Category']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($category['Category']['name']); ?>
			&nbsp;
		</dd>
	</dl>
	
	<br><br>
	
	<div class="related">
		<h3><?php echo __('Related Devices'); ?></h3>
		<?php if (!empty($category['Product'])): ?>
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
			foreach ($category['Product'] as $product): ?>
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
	<div class="related">
		<h3><?php echo __('Related Models'); ?></h3>
		<?php if (!empty($category['Subcategory'])): ?>
		<table cellpadding = "0" cellspacing = "0">
		<tr>
			<th><?php echo __('Id'); ?></th>
			<th><?php echo __('Category Id'); ?></th>
			<th><?php echo __('Name'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php
			$i = 0;
			foreach ($category['Subcategory'] as $subcategory): ?>
			<tr>
				<td><?php echo $subcategory['id']; ?></td>
				<td><?php echo $subcategory['category_id']; ?></td>
				<td><?php echo $subcategory['name']; ?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('controller' => 'subcategories', 'action' => 'view', $subcategory['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('controller' => 'subcategories', 'action' => 'edit', $subcategory['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'subcategories', 'action' => 'delete', $subcategory['id']), null, __('Are you sure you want to delete # %s?', $subcategory['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php endif; ?>

		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('New Subcategory'), array('controller' => 'subcategories', 'action' => 'add')); ?> </li>
			</ul>
		</div>
	</div>
	
</div>

<div class="actions">
	<?php echo $this->element('tr_menu'); ?></div>


