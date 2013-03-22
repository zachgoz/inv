<div class="actions">
<ul>
        <li><?php echo $this->Html->link($this->Html->image("tr/Checkouts_Add.png") . " " . __('New Checkout'), array('controller' => 'checkouts', 'action' => 'add', 'plugin' => ''), array('escape' => false)); ?> </li>
        <li><?php echo $this->Html->link($this->Html->image("tr/Products_Add.png") . " " . __('New Product'), array('controller' => 'products', 'action' => 'add', 'plugin' => ''), array('escape' => false)); ?> </li>
</ul>
</div>
