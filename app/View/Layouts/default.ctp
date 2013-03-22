<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
		$appname = "Inventory Admin System";
	?>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo __($appname) . ':'; ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
		echo $this->Html->css('tr.generic');
		echo $this->Html->css('chosen.css');
		echo $this->Html->css('/usermgmt/css/umstyle');
		echo $this->Html->script('jquery.min.js');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link(__($appname), '/'); ?></h1>
                        <?php  if (isset($authUser) && $authUser) { ?>
                                <?php echo $this->element('tr_header'); ?>
                                <div id="tr_header_auth">Logged in as: <b><?php echo $authUser['User']['name'] ?></b> 
				| <?php echo $this->Html->link(__("Profile",true), '/viewUser/' . $authUser['User']['id']) ?>
				| <?php echo $this->Html->link(__("Logout",true),"/logout") ?></div>
                        <?php } else { ?>
                                <div id="tr_header_auth"><?php echo $this->Html->link(__("Login",true),"/") ?></div>
                        <?php } ?>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php if (isset($Tr) && is_array($Tr)) { ?>Copyright (c) <?php echo $Tr['StartYear'] ?>-2012 <?php echo $Tr['Copyright'] . " |"; } ?>
			Developed by <a href="http://zachgosling.com/">Zach Gosling</a> | 
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => __('CakePHP: the rapid development php framework'), 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
	<?php
		// secho $this->Html->script('chosen.jquery.min.js');
		//echo $this->Html->script('tr.chosen.js');
	?>
	<?php echo $this->element('sql_dump'); ?>
	
	<!-- scripts_for_layout -->
	<?php echo $scripts_for_layout; ?>
	<!-- Js writeBuffer -->
	<?php
	if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) echo $this->Js->writeBuffer();
	// Writes cached scripts
	?>
	
</body>
</html>
