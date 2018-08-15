<?php
$this->breadcrumbs=array(
	'Damage Report Repairs'=>array('index'),
	$model->id_damage_report_repair=>array('view','id'=>$model->id_damage_report_repair),
	'Update',
);

	$this->menu=array(
	//array('label'=>'List DamageReportRepair','url'=>array('index')),
	//array('label'=>'Create DamageReportRepair','url'=>array('create')),
	array('label'=>'List Vessel Damage Report', 'url'=>array('repair/listofvessel','mode'=>'DAMAGE')),
	array('label'=>'Manage Damage Report','url'=>array('repair/damage','id'=>$modelDamage->id_vessel)),
	array('label'=>'Update Damage Report Repair','url'=>array('damageReportRepair/update','id'=>$model->id_damage_report)),
	array('label'=>'View Damage Report Repair','url'=>array('damageReportRepair/view','id'=>$model->id_damage_report)),
	//array('label'=>'Manage DamageReportRepair','url'=>array('admin')),
	);
	?>


<div id="content">
<h2>Update Damage Report Repair for Damage no <?php echo $modelDamage->DamageReportNumber.' - '.$modelDamage->idVessel->VesselName ?> </h2>
<hr>
</div>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>