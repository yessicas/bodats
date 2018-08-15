<?php
$this->breadcrumbs=array(
	'Vessel Insurance Accruals'=>array('index'),
	'Create',
);

$this->menu=array(
//array('label'=>'List VesselInsuranceAccrual','url'=>array('index')),
//array('label'=>'Manage VesselInsuranceAccrual','url'=>array('admin')),

array('label'=>'Insurance Accrual Of Vessel','url'=>array('vesselInsuranceAccrual/index')),
array('label'=>'Add Insurance Accrual Of Vessel', 'url'=>array('vesselInsuranceAccrual/create','id_vessel'=>$_GET['id_vessel'],'year'=>$_GET['year'])),
	
);
?>
<div id="content">
<h2>Add Insurance Accrual Of Vessel <?php echo $modelvessel->VesselName ?> Year <?php echo $_GET['year'] ?></h2>
<hr>
</div>


<?php echo $this->renderPartial('_form_create', array('model'=>$model,'modelvessel'=>$modelvessel,)); ?>