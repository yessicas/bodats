<?php
$this->breadcrumbs=array(
	'Setting Voyage Reports'=>array('index'),
	$model->id_setting_tax_report=>array('view','id'=>$model->id_setting_tax_report),
	'Update',
);

	$this->menu=array(
	// array('label'=>'List SettingVoyageReport','url'=>array('index')),
	array('label'=>'Manage SettingVoyageReport','url'=>array('setting/voyage')),
array('label'=>'Create SettingVoyageReport','url'=>array('setting/voaygecreate')),
array('label'=>'View SettingVoyageReport','url'=>array('setting/voyageview','id'=>$model->id_setting_tax_report)),
array('label'=>'Update SettingVoyageReport','url'=>array('setting/voyageupdate','id'=>$model->id_setting_tax_report)),

array('label'=>'Delete SettingVoyageReport','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_setting_tax_report),'confirm'=>'Are you sure you want to delete this item?')),

	
	);
	?>

	<h3>Update SettingVoyageReport<font color=#BD362F> <?php echo $model->field_name; ?></font></h3>
	<hr>

<?php echo $this->renderPartial('../SettingVoyageReport/_form',array('model'=>$model)); ?>