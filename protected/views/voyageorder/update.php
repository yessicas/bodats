<?php
$this->breadcrumbs=array(
	'Voyage Orders'=>array('index'),
	$model->id_voyage_order=>array('view','id'=>$model->id_voyage_order),
	'Update',
);

	$this->menu=array(
	array('label'=>'List VoyageOrder','url'=>array('index')),
	array('label'=>'Create VoyageOrder','url'=>array('create')),
	array('label'=>'View VoyageOrder','url'=>array('view','id'=>$model->id_voyage_order)),
	array('label'=>'Manage VoyageOrder','url'=>array('admin')),
	);
	?>

	<h2>Update VoyageOrder <?php echo $model->id_voyage_order; ?></h2>
	<hr>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>