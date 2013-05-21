    <?php echo $this->Html->script('jquery.dataTables.js'); ?>
    <?php echo $this->Html->css('jquery.dataTables_themeroller.css'); ?>
    <?php echo $this->Html->css('jquery.dataTables.css'); ?>
    <?php echo $this->Html->css('jquery-ui-1.8.4.custom.css'); ?>
<script>
    $(document).ready(function() {
        oTable = $('#dataTable').dataTable({
            "bJQueryUI": true,
            "sPaginationType": "full_numbers"
        });
    } );
</script>

<div class="actions">
	<?php echo $this->element('tr_menu'); ?>
</div>
	
<div class="products index">
	<h2><?php echo __('Devices');?></h2>
<div id="tr_indexview_actions">
	<div class="actions">
	<ul>
		<li>
		<?php echo $this->Html->link($this->Html->image('tr/Add.png') . " " . __('New Product'), array('action' => 'add'), array('escape' => false)); ?>
		</li>
	</ul>
	</div>
</div>

<table cellpadding="0" cellspacing="0" id="dataTable">
	<thead>
	<tr>
			<th>ID</th>
			<th>Vendor</th>
			<th>Model</th>
			<th>Location</th>
			<th>Mac</th>
			<th>Notes</th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	</thead>
    <tbody>
	<?php foreach ($products as $product): ?>
	<tr class="hovertable">
		<td onclick="document.location = 'products/view/<?php echo h($product['Product']['id']); ?>';" >
            <?php echo h($product['Product']['id']); ?>&nbsp;</td>
        <td onclick="document.location = 'products/view/<?php echo h($product['Product']['id']); ?>';" >
            <?php echo h($product['Category']['name']); ?>&nbsp;</td>
        <td onclick="document.location = 'products/view/<?php echo h($product['Product']['id']); ?>';" >
            <?php echo h($product['Subcategory']['name']); ?>&nbsp;</td>
        <td onclick="document.location = 'products/view/<?php echo h($product['Product']['id']); ?>';" >
            <?php echo h($product['Product']['location']); ?>&nbsp;</td>
        <td onclick="document.location = 'products/view/<?php echo h($product['Product']['id']); ?>';" >
            <?php echo h($product['Product']['mac']); ?>&nbsp;</td>
        <td onclick="document.location = 'products/view/<?php echo h($product['Product']['id']); ?>';" >
            <?php echo h($product['Product']['description']); ?>&nbsp;</td>
		<td style="min-width: 155px; cursor: default">
			<?php echo $this->Html->link($this->Html->image('tr/Checkouts_Add.png') . " " . __('Checkout'), array('controller' => 'Checkouts','action' => 'add', $product['Product']['id']), array('escape' => false, 'class' => 'button')); ?>
			<?php echo $this->Html->link($this->Html->image('tr/Edit.png'), array('action' => 'edit', $product['Product']['id']), array('escape' => false)); ?>
			<?php echo $this->Form->postLink($this->Html->image('tr/Delete.png'), array('action' => 'delete', $product['Product']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?>
            <?php /* echo $this->Form->input('Product.id.'.$product['Product']['id'] ,
                array('label' => false,
                      'type' => 'checkbox',
                      'id'=>'listing_'.$product['Product']['id'])); */?>
        </td>
	</tr>
    <?php endforeach; ?>
    </tbody>
	</table>


</div>
