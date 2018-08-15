<?php
$this->breadcrumbs=array(
	'Customer Rating'=>array('rating'),
	'',
);

$this->menu=array(
 
    array('label'=>'Manage Crew', 'url'=>array('admin')),
    array('label'=>'Create Crew', 'url'=>array('create')),
);
?>
<div id="content">
	<h2>Customer Rating</h2>
	<hr>
	</div>


<?php echo $this->renderPartial('../customerrating/ratingvolpay',array(
		
	)); ?>