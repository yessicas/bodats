<?php
$this->breadcrumbs=array(
	'Availability'=>array('index'),
	'Search',
);

$this->menu=array(
 
    array('label'=>'Manage Crew', 'url'=>array('admin')),
    array('label'=>'Create Crew', 'url'=>array('create')),
);
?>
<div id="content">
	<h2>Check Availability</h2>
	<hr>
	</div>


<?php echo $this->renderPartial('../reservationinquiry/available',array(
		'arrayDataProvider'=>$arrayDataProvider,
	)); ?>