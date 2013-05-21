<?php echo $this->Html->script('jquery.dataTables.js'); ?>
<?php echo $this->Html->css('jquery.dataTables_themeroller.css'); ?>
<?php echo $this->Html->css('jquery.dataTables.css'); ?>
<?php echo $this->Html->css('jquery-ui-1.8.4.custom.css'); ?>
<script>
    $(document).ready(function() {
        oTable = $('#js-datatable').dataTable({
            "bJQueryUI": true,
            "sPaginationType": "full_numbers"
        });
    } );
</script>

<div class="actions">
	<?php echo $this->element('tr_menu'); ?>
</div>

<div class="types view">
<h2><?php echo h($type['Type']['name']),'s'; ?></h2>

	<div id="tr_indexview_actions">
		<div class="actions">
		<ul>
			<li>
			<?php echo $this->Html->link($this->Html->image('tr/Add.png') . " " . __('New Product'), array('controller' => 'products', 'action' => 'add'), array('escape' => false)); ?>
			</li>
			<!-- <li><a href="javascript:toggleTrFilter()"><?php echo $this->Html->image('tr/Search.png'); ?> Search / Filter</a></li> -->
		</ul>
		</div>
	</div>
	



<div class="related">

	<?php if (!empty($type['Product'])): ?>
	<table cellpadding = "0" cellspacing = "0" id="js-datatable">
	<thead>
	<tr>
		<th>ID</th>
		<th>Vendor</th>
		<th>Model</th>
		<th>CPU</th>
		<th>RAM</th>
		<th>OS</th>
		<th>Tag#</th>
		<th>Notes</th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<?php
		$i = 0;
		foreach ($type['Product'] as $product): ?>
		<tr onclick="document.location = '/inv-master/products/view/<?php echo $product['id']; ?>';" class="hovertable">
			<td><?php echo $product['id']; ?></td>
			<td><?php echo $product['Category']['name']; ?></td>
			<td><?php echo $product['Subcategory']['name']; ?></td>
 			<td><?php echo $product['cpu']; ?></td>
			<td><?php echo $product['ram']; ?></td>
			<td><?php echo $product['os']; ?></td>
			<td><?php echo $product['mac']; ?></td>
			<td><?php echo $product['description']; ?></td>
            <td style="min-width: 155px; cursor: default">
				<?php echo $this->Html->link($this->Html->image('tr/Checkouts_Add.png') . " " . __('Checkout'), array('controller' => 'Checkouts','action' => 'add', $product['id']), array('escape' => false, 'class' => 'button')); ?>
				<?php echo $this->Html->link($this->Html->image('tr/Edit.png'), array('controller' => 'products', 'action' => 'edit', $product['id']), array('escape' => false)); ?>
                <?php echo $this->Form->postLink($this->Html->image('tr/Delete.png'), array('controller' => 'products', 'action' => 'delete', $product['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $product['id'])); ?>

            </td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
</div>
