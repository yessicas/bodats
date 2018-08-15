<?php
$this->breadcrumbs=array(
	'Vessel Insurance Accruals'=>array('index'),
	$model->id_vessel_insurance_accrual=>array('view','id'=>$model->id_vessel_insurance_accrual),
	'Update',
);

	$this->menu=array(
	//array('label'=>'List VesselInsuranceAccrual','url'=>array('index')),
	//array('label'=>'Create VesselInsuranceAccrual','url'=>array('create')),
	//array('label'=>'View VesselInsuranceAccrual','url'=>array('view','id'=>$model->id_vessel_insurance_accrual)),
	//array('label'=>'Manage VesselInsuranceAccrual','url'=>array('admin')),

	array('label'=>'Insurance Accrual Of Vessel','url'=>array('vesselInsuranceAccrual/index')),
	array('label'=>'Update Insurance Accrual Of Vessel', 'url'=>array('vesselInsuranceAccrual/update','id_vessel'=>$_GET['id_vessel'],'year'=>$_GET['year'])),

	);
	?>

	<div id="content">
	<h2>Update Insurance Accrual Of Vessel <?php echo $model->Vessel->VesselName ?> Year <?php echo $model->year ?></h2>
	<hr>
	</div>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>