<?php
$this->breadcrumbs=array(
	'Jetties'=>array('index'),
	$model->JettyId=>array('view','id'=>$model->JettyId),
	'Update',
);

	$this->menu=array(
	array('label'=>'Manage Jetty','url'=>array('entity/entijet')),
	array('label'=>'Create Jetty','url'=>array('entity/entijetcreate')),
	array('label'=>'View Jetty','url'=>array('entity/entijetview','id'=>$model->JettyId)),
	array('label'=>'Update Jetty','url'=>array('entity/entijetupdate','id'=>$model->JettyId)),
	);
	?>

<div id="content">
	<h2>Update Jetty # <font color="#BD362F"><?php echo $model->JettyName; ?></font></h2>
	<hr>
</div>
<?php echo $this->renderPartial('../jetty/_form',array('model'=>$model)); ?>