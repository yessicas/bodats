<?php
$this->breadcrumbs=array(
	'Request For Schedules'=>array('index'),
	$model->id_request_for_schedule=>array('view','id'=>$model->id_request_for_schedule),
	'Update',
);

	$titleMenu=isset($_GET['mode']) ? $_GET['mode'] : 'DOCKING';
	$this->menu=array(
	// array('label'=>'List RequestForSchedule','url'=>array('index')),
	//array('label'=>'Manage RequestForSchedule','url'=>array('admin')),
	//array('label'=>'Create RequestForSchedule','url'=>array('create')),
	//array('label'=>'View RequestForSchedule','url'=>array('view','id'=>$model->id_request_for_schedule)),
	//array('label'=>'Update RequestForSchedule','url'=>array('update','id'=>$model->id_request_for_schedule)),
	
	
	

	array('label'=>'Manage RFS '.$titleMenu,'url'=>array('requestForSchedule/admin','mode'=>isset($_GET['mode']) ? $_GET['mode'] : 'DOCKING' )),
	array('label'=>'Create RFS '.$titleMenu,'url'=>array('requestForSchedule/create','mode'=>isset($_GET['mode']) ? $_GET['mode'] : 'DOCKING')),
	array('label'=>'Update RFS '.$titleMenu,'url'=>array('requestForSchedule/update','id'=>$model->id_request_for_schedule,'mode'=>isset($_GET['mode']) ? $_GET['mode'] : 'DOCKING')),
	array('label'=>'Approved RFS '.$titleMenu,'url'=>array('requestForSchedule/approved','mode'=>isset($_GET['mode']) ? $_GET['mode'] : 'DOCKING')),
	array('label'=>'Rejected RFS '.$titleMenu,'url'=>array('requestForSchedule/rejected','mode'=>isset($_GET['mode']) ? $_GET['mode'] : 'DOCKING')),



	);
	?>


<div id="content">
<h2>Update Request For Schedule <?php echo isset($_GET['mode']) ? $_GET['mode'] : 'DOCKING' ?> <?php echo $model->vessel->VesselName; ?></h2>
<hr>
</div>

<?php echo $this->renderPartial('../RequestForSchedule/_form',array('model'=>$model)); ?>