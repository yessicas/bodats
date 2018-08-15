<?php
$this->breadcrumbs=array(
	'Mst Metric Prs'=>array('index'),
	$model->metric=>array('view','id'=>$model->metric),
	'Update',
);

	$this->menu=array(
	// array('label'=>'List MstMetricPr','url'=>array('index')),
	array('label'=>'Manage Metric PR','url'=>array('master/maspr')),
array('label'=>'Create Metric PR','url'=>array('master/masprcreate')),
array('label'=>'View Metric PR','url'=>array('master/masprview','id'=>$model->metric)),
array('label'=>'Update Metric PR','url'=>array('master/masprupdate','id'=>$model->metric),'active'=>true),

array('label'=>'Delete Metric PR','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->metric),'confirm'=>'Are you sure you want to delete this item?')),

	);
	?>

	<h3>Update Metric PR<font color=#BD362F> <?php echo $model->metric; ?></font></h3>
	<hr>

<?php echo $this->renderPartial('../MstMetricPr/_form',array('model'=>$model)); ?>