<?php
$this->breadcrumbs=array(
	'Standard Agencies'=>array('index'),
	$model->id_standard_agency=>array('view','id'=>$model->id_standard_agency),
	'Update',
);

	$this->menu=array(
	array('label'=>'Create Standard Agency','url'=>array('create')),
	array('label'=>'View Standard Agency','url'=>array('view','id'=>$model->id_standard_agency)),
	array('label'=>'Manage Standard Agency','url'=>array('admin')),
	);
	?>

	<h2>Update Standard Agency <?php echo $model->id_standard_agency; ?></h2>
	<hr>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>