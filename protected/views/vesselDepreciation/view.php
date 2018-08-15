<?php
/* @var $this VesselDepreciationController */
/* @var $model VesselDepreciation */

$this->breadcrumbs=array(
	'Vessel Depreciations'=>array('index'),
	$model->id_vessel_depreciation,
);

$this->menu=array(
	array('label'=>'List VesselDepreciation', 'url'=>array('index')),
	array('label'=>'Create VesselDepreciation', 'url'=>array('create')),
	array('label'=>'Update VesselDepreciation', 'url'=>array('update', 'id'=>$model->id_vessel_depreciation)),
	array('label'=>'Delete VesselDepreciation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_vessel_depreciation),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage VesselDepreciation', 'url'=>array('admin')),
);
?>

<h1>View VesselDepreciation #<?php echo $model->id_vessel_depreciation; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_vessel_depreciation',
		'id_vessel',
		'year',
		'amount',
		'created_date',
		'created_user',
		'ip_user_updated',
	),
)); ?>
