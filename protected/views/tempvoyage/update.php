<?php
/* @var $this TempvoyageController */
/* @var $model TempVoyage */

$this->breadcrumbs=array(
	'Temp Voyages'=>array('index'),
	$model->id_temp_voyage=>array('view','id'=>$model->id_temp_voyage),
	'Update',
);

$this->menu=array(
	array('label'=>'List TempVoyage', 'url'=>array('index')),
	array('label'=>'Create TempVoyage', 'url'=>array('create')),
	array('label'=>'View TempVoyage', 'url'=>array('view', 'id'=>$model->id_temp_voyage)),
	array('label'=>'Manage TempVoyage', 'url'=>array('admin')),
);
?>

<h1>Update TempVoyage <?php echo $model->id_temp_voyage; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>