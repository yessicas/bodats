<?php
/* @var $this TempvoyageController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Temp Voyages',
);

$this->menu=array(
	array('label'=>'Create TempVoyage', 'url'=>array('create')),
	array('label'=>'Manage TempVoyage', 'url'=>array('admin')),
);
?>

<h1>Temp Voyages</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
