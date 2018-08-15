<?php
$this->breadcrumbs=array(
	'Voyage Mst Activities'=>array('index'),
	$model->id_voyage_activity=>array('view','id'=>$model->id_voyage_activity),
	'Update',
);

	$this->menu=array(
	// array('label'=>'List VoyageMstActivity','url'=>array('index')),
	array('label'=>'Manage Voyage Activity','url'=>array('master/masvoy')),
	array('label'=>'Create Voyage Activity','url'=>array('master/masvoycreate')),
	//array('label'=>'View VoyageMstActivity','url'=>array('view','id'=>$model->id_voyage_activity)),
	array('label'=>'Update Voyage Activity','url'=>array('update','id'=>$model->id_voyage_activity),'active'=>true),
	
	);
	?>

	<h4>Update Voyage Activity <font color=#BD362F> <?php echo $model->voyage_activity_desc; ?></font></h4>
	<hr>
<?php echo $this->renderPartial('../VoyageMstActivity/_form',array('model'=>$model)); ?>