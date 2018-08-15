<?php
/* @var $this VesselDepreciationController */
/* @var $model VesselDepreciation */

$this->breadcrumbs=array(
	'Vessel Depreciations'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List VesselDepreciation', 'url'=>array('index')),
	//array('label'=>'Manage VesselDepreciation', 'url'=>array('admin')),
	array('label'=>'Vessel Depreciation', 'url'=>array('vesselDepreciation/index')),
	//array('label'=>'List VesselDepreciation', 'url'=>array('index')),
	array('label'=>'Add Vessel Depreciation', 'url'=>array('vesselDepreciation/create','id_vessel'=>$_GET['id_vessel'],'year'=>$_GET['year'])),
	
);
?>

<div id="content">
<h2>Add Vessel Depreciation <?php echo $modelvessel->VesselName ?> Year <?php echo $_GET['year'] ?></h2>
<hr>
</div>

<?php echo $this->renderPartial('_form_create', array('model'=>$model,'modelvessel'=>$modelvessel)); ?>