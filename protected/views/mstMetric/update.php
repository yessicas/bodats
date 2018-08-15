<?php
$this->breadcrumbs=array(
	'Mst Metrics'=>array('index'),
	$model->metric=>array('view','id'=>$model->metric),
	'Update',
);

	$this->menu=array(
	// array('label'=>'List MstMetric','url'=>array('index')),
	array('label'=>'Manage Metric','url'=>array('master/mastric')),
array('label'=>'Create Metric','url'=>array('master/mastriccreate')),

array('label'=>'View Metric','url'=>array('master/mastricview','id'=>$model->metric)),
array('label'=>'Update Metric','url'=>array('master/mastricupdate','id'=>$model->metric),'active'=>true),

array('label'=>'Delete Metric','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->metric),'confirm'=>'Are you sure you want to delete this item?')),

	
	);
	?>

	<h3>Update Metric<font color=#BD362F> <?php echo $model->metric; ?></font></h3>
	<hr>

<?php echo $this->renderPartial('../MstMetric/_form',array('model'=>$model)); ?>