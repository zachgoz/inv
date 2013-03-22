<div class="actions">
	<?php echo $this->element('tr_menu'); ?></div>

<div class="categories index">
	<h2><?php echo __('Vendors'); ?></h2>
	
	
	<div id="tr_indexview_actions">
		<div class="actions">
		<ul>
			<li>
			<?php echo $this->Html->link($this->Html->image('tr/Add.png') . " " . __('New Vendor'), array('action' => 'add'), array('escape' => false)); ?>
			</li>
		</ul>
		</div>
	</div>
	
	<script type='text/javascript' src="js/jquery.cookie.js"></script>
	<script type='text/javascript' src="js/jquery.collapsible.js"></script>
	<script type='text/javascript'>
	$(document).ready(function() {
		$.collapsible(".module .header");
	});
	</script>
	<div class="relatedtable" >
		
	<div class="modulecell-actions"><?php echo __('Actions'); ?></div>
	<div class="modulerow" style="width:70%;">
			<div class="modulecell" style="width:5%;"><?php echo $this->Paginator->sort('id'); ?></div>
			<div class="modulecell" style="width:15%;"><?php echo $this->Paginator->sort('name'); ?></div>
			<div class="modulecell" style="width:15%;"><?php echo $this->Paginator->sort('Devices'); ?></div>		
	</div>
		
	<?php foreach ($categories as $category): ?>
	<div class="module">
		
		<div class="modulecell-actions" >
			<!-- <?php echo $this->Html->link(__('View'), array('action' => 'view', $category['Category']['id'])); ?> -->
			<?php echo $this->Html->link($this->Html->image('tr/Edit.png'), array('action' => 'edit', $category['Category']['id']), array('escape' => false)); ?>
			<?php echo $this->Form->postLink($this->Html->image('tr/Delete.png'), array('action' => 'delete', $category['Category']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?>
		</div>	
		<div class="modulerow header"style="width:70%;">
			
			<div class="modulecell" style="width:5%;"><?php echo h($category['Category']['id']); ?>&nbsp;</div>
			<div class="modulecell" style="width:15%;"><?php echo h($category['Category']['name']); ?>&nbsp;</div>
			<div class="modulecell" style="width:15%;"><?php echo count($category['Product']); //returns an integer ?></div>	
		</div>


		<?php if (!empty($category['Subcategory'])): ?>
		
		<div style="display: none;padding-left:60px;margin-left:15%;">
		<!-- 
		<div class="relatedrow">
			<span class="relatedcell"><?php echo __('Name'); ?></span>
			<span class="relatedcell"><?php echo __('Devices'); ?></span>
			<span class="relatedcell"><?php echo __('Actions'); ?></span>
		</div>
		-->
		
		<?php
			$i = 0;
			foreach ($category['Subcategory'] as $subcategory): ?>
			<div class="relatedrow">
				<span class="relatedcell" style="text-align:right;"><?php echo count($subcategory['Product']); //returns an integer ?> x</span>
				<span class="relatedcell"><?php echo $this->Html->link($subcategory['name'], array('controller' => 'subcategories', 'action' => 'view', $subcategory['id'])); ?></span>
				<span class="relatedcell">
					

					
				<!-- foreach loop to return unique location for each model -->
				<?php
				/*	$locations = array();
					foreach($subcategory['Product'] as $models){
						// var_dump($models['location']);
					    if ( in_array($models['location'], $locations) ) {
							$i++;
					        continue;
					    } 
					    $locations[] = $models['location'];
					    echo $i . "in" . $models['location'] . " ";
						$i = 1;
					}
				*/	
					$locations = array();
					foreach($subcategory['Product'] as $models) {
					    if(isset($locations[$models['location']])){
					       $locations[$models['location']] += 1;
					    } else {
					       $locations[$models['location']] = 1;
					    }
					
					}
					foreach($locations as $key => $count) {
				     echo $count . "in<strong>" . $key . "</strong> " ;
				 }
				?>
				
				
				<!-- foreach loop to return each unique location -->
				
				</span>
				<span class="relatedcell">
					<?php echo $this->Html->link($this->Html->image('tr/Edit.png'), array('controller' => 'subcategories', 'action' => 'edit', $subcategory['id']), array('escape' => false)); ?>
					<?php echo $this->Form->postLink($this->Html->image('tr/Delete.png'), array('controller' => 'subcategories', 'action' => 'delete', $subcategory['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $subcategory['id'])); ?></span>
					
			</div>
		<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>
	<?php endforeach; ?>
	</div>
	
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

