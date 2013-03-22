        <ul>
                <li><?php echo $this->Html->link($this->Html->image("tr/Checkouts.png") . " " .  __('Checkouts'), array('controller' => 'checkouts', 'action' => 'index', 'plugin' => ''), array('escape' => false)); ?> </li>
                <li><?php echo $this->Html->link($this->Html->image("tr/Products.png") . " " .  __('Devices'), array('controller' => 'products', 'action' => 'index', 'plugin' => ''), array('escape' => false)); ?> </li>

                <li><?php echo $this->Html->link($this->Html->image("tr/Products.png") . " " .  __('Laptops'), array('controller' => 'types', 'action' => 'view','3', 'plugin' => ''), array('escape' => false)); ?> </li>

				<li><?php echo $this->Html->link($this->Html->image("tr/Tags.png") . " " .  __('Vendors'), array('controller' => 'categories', 'action' => 'index', 'plugin' => ''), array('escape' => false)); ?> </li>
<!--
				<li><?php echo $this->Html->link($this->Html->image("tr/Tags.png") . " " .  __('Models'), array('controller' => 'subcategories', 'action' => 'index', 'plugin' => ''), array('escape' => false)); ?> </li>
				
                <li><?php echo $this->Html->link($this->Html->image("tr/Tags.png") . " " .  __('Tags'), array('controller' => 'tags', 'action' => 'index', 'plugin' => ''), array('escape' => false)); ?> </li>
-->
		<br/>
                <li><?php echo $this->Html->link($this->Html->image("tr/Checkouts_Old.png") . " " .  __('Old Checkouts'), array('controller' => 'checkouts', 'action' => 'archive', 'plugin' => ''), array('escape' => false)); ?> </li>
		<br/>
<!--                 <li><?php echo $this->Html->link($this->Html->image("tr/Reports.png") . " " .  __('Reports'), array('controller' => 'reports', 'action' => 'index', 'plugin' => 'report_manager'), array('escape' => false)); ?> </li>
-->
                <li><?php echo $this->Html->link($this->Html->image("tr/Users.png") . " " .  __('Users'), array('controller' => '', 'action' => 'user_dashboard', 'plugin' => ''), array('escape' => false)); ?> </li>
        </ul>
