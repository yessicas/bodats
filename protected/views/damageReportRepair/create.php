<?php
$this->breadcrumbs=array(
	'Damage Report Repairs'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Vessel Damage Report', 'url'=>array('repair/listofvessel','mode'=>'DAMAGE')),
array('label'=>'Manage Damage Report','url'=>array('repair/damage','id'=>$modelDamage->id_vessel)),
array('label'=>'Create Damage Report Repair','url'=>array('damageReportRepair/create','id'=>$_GET['id'])),
//array('label'=>'Create Damage Report Repair','url'=>array('create','id'=>$model->id_damage_report)),
);
?>

<div id="content">
<h2>Create Damage Report Repair for Damage no <?php echo $modelDamage->DamageReportNumber.' - '.$modelDamage->idVessel->VesselName ?> </h2>
<hr>
</div>



<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>