<?php
/* @var $this VesselDepreciationController */
/* @var $model VesselDepreciation */

$this->breadcrumbs=array(
	'Vessel Depreciations'=>array('index'),
	$model->id_vessel_depreciation=>array('view','id'=>$model->id_vessel_depreciation),
	'Update',
);

$this->menu=array(
	array('label'=>'Vessel Depreciation', 'url'=>array('vesselDepreciation/index')),
	//array('label'=>'List VesselDepreciation', 'url'=>array('index')),
	array('label'=>'Update Vessel Depreciation', 'url'=>array('vesselDepreciation/update','id_vessel'=>$_GET['id_vessel'],'year'=>$_GET['year'])),
	//array('label'=>'View VesselDepreciation', 'url'=>array('view', 'id'=>$model->id_vessel_depreciation)),
	//array('label'=>'Manage VesselDepreciation', 'url'=>array('admin')),
);
?>

<div id="content">
<h2>Update Vessel Depreciation <?php echo $model->Vessel->VesselName ?> Year <?php echo $model->year ?></h2>
<hr>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>