<?php
/* @var $this VesselController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Vessels',
);

$this->menu=array(
	array('label'=>'Create Vessel', 'url'=>array('create')),
	array('label'=>'Manage Vessel', 'url'=>array('admin')),
);
?>

<div id="content">
<h2>Vessel</h2>
<hr>
</div>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
