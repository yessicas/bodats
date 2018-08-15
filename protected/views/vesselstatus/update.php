<?php
$this->breadcrumbs=array(
	'Vessel Statuses'=>array('index'),
	$model->id_vessel_status=>array('view','id'=>$model->id_vessel_status),
	'Update',
);

	$this->menu=array(
	array('label'=>'List VesselStatus','url'=>array('index')),
	array('label'=>'Create VesselStatus','url'=>array('create')),
	array('label'=>'View VesselStatus','url'=>array('view','id'=>$model->id_vessel_status)),
	array('label'=>'Manage VesselStatus','url'=>array('admin')),
	);
	?>

	<div id="content">
<h2>Update Vessel Status # <font color="#BD362F"> <?php echo $model->vessel_status; ?></font></h2>
<hr>
</div>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>