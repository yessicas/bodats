<?php
$this->breadcrumbs=array(
	'Damage Reports'=>array('index'),
	$model->id_damage_report=>array('view','id'=>$model->id_damage_report),
	'Update',
);

	$this->menu=array(
	//array('label'=>'Manage Damage Report','url'=>array('repair/damage')),
	//array('label'=>'Create Damage Report','url'=>array('repair/damagecreate')),
	//array('label'=>'View Damage Report','url'=>array('repair/damageview','id'=>$model->id_damage_report)),
	array('label'=>'List of Vessel Damage Report', 'url'=>array('repair/listofvessel','mode'=>'DAMAGE')),
	array('label'=>'Manage Damage Report','url'=>array('repair/damage','id'=>$model->id_vessel)),
	array('label'=>'Create Damage Report','url'=>array('repair/damagecreate','id'=>$model->id_vessel)),
	array('label'=>'Update Damage Report','url'=>array('repair/damageupdate','id'=>$model->id_damage_report)),
	//array('label'=>'Delete Damage Report','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_damage_report),'confirm'=>'Are you sure you want to delete this item?')),
	
	);
	?>
<div id="content">
	<h2>Update Damage Report # <font color="#BD362F"> <?php echo $model->idVessel->VesselName; ?></font></h2>
	<hr>
</div>
<?php echo $this->renderPartial('../DamageReport/_form',array('model'=>$model)); ?>