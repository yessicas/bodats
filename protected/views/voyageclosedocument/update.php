<?php
$this->breadcrumbs=array(
	'Voyage Close Documents'=>array('index'),
	$model->id_voyage_close_document=>array('view','id'=>$model->id_voyage_close_document),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Voyage Close Document','url'=>array('index')),
	array('label'=>'Create Voyage Close Document','url'=>array('create')),
	array('label'=>'View Voyage Close Document','url'=>array('view','id'=>$model->id_voyage_close_document)),
	array('label'=>'Manage Voyage Close Document','url'=>array('admin')),
	);
	?>

	<h2>Update VoyageCloseDocument <?php echo $model->id_voyage_close_document; ?></h2>
	<hr>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>