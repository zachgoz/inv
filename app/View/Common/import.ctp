<h3>Import <?php echo Inflector::pluralize($modelClass);?> from CSV data file</h3>
<?php
    echo $this->Form->create($modelClass, array('action' => 'import', 'type' => 'file') );
    echo $this->Form->input('CsvFile', array('label'=>'','type'=>'file') );
    echo $this->Form->end('Submit');

?>