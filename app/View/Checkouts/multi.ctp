<div class="checkouts form">

    <fieldset>
        <legend>Multi</legend>

        <?php
        echo $this->Form->create('Checkout', array('action' => 'multi'));
        for($i = 0; $i < $count; $i++){
            echo $this->Form->input("Checkout.$i.product_id", array());
            echo $this->Form->input("Checkout.$i.start_time", array());
            echo $this->Form->input("Checkout.$i.end_time", array());
            echo $this->Form->input("Checkout.$i.user_id", array());
        }
        echo $this->Form->end('add');
        ?>
    </fieldset>

</div>
<div class="actions">
    <?php echo $this->element('tr_menu'); ?></div>
