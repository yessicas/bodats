<?php
/* @var $this TempvoyageController */
/* @var $model TempVoyage */

$this->breadcrumbs=array(
	'Temp Voyages'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TempVoyage', 'url'=>array('index')),
	array('label'=>'Manage TempVoyage', 'url'=>array('admin')),
);
?>

<h1>Create TempVoyage</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>