<?php
$this->breadcrumbs=array(
	'Setting Tax Reports'=>array('index'),
	$model->id_setting_tax_report=>array('view','id'=>$model->id_setting_tax_report),
	'Update',
);

	$this->menu=array(
	// array('label'=>'List SettingTaxReport','url'=>array('index')),
	array('label'=>'Manage Setting Tax Report','url'=>array('admin')),
	array('label'=>'Create Setting Tax Report','url'=>array('create')),
	array('label'=>'View Setting Tax Report','url'=>array('view','id'=>$model->id_setting_tax_report)),
	array('label'=>'Update Setting Tax Report','url'=>array('update','id'=>$model->id_setting_tax_report)),
	
	);
	?>

	<h3>Update Setting Tax Report<font color=#BD362F> <?php echo $model->field_name; ?></font></h3>
	<hr>

<?php echo $this->renderPartial('../SettingTaxReport/_form',array('model'=>$model)); ?>