<?php
$this->breadcrumbs=array(
	'Setting Spal Reports'=>array('index'),
	$model->id_setting_spal_report=>array('view','id'=>$model->id_setting_spal_report),
	'Update',
);

	$this->menu=array(
	// array('label'=>'List Setting SPAL Report','url'=>array('index')),
	array('label'=>'Manage Setting SPAL Report','url'=>array('admin')),
	array('label'=>'Create Setting SPAL Report','url'=>array('create')),
	array('label'=>'View Setting SPAL Report','url'=>array('view','id'=>$model->id_setting_spal_report)),
	array('label'=>'Update Setting SPAL Report','url'=>array('update','id'=>$model->id_setting_spal_report)),
	
	);
	?>

	<h4>Update Setting SPAL Report <font color=#BD362F> # <?php echo $model->field_name; ?></font></h4>
	<hr>

<?php echo $this->renderPartial('../SettingSpalReport/_form',array('model'=>$model)); ?>