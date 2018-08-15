<?php
$this->breadcrumbs=array(
	'Setting Generals'=>array('index'),
	$model->id_setting_general=>array('view','id'=>$model->id_setting_general),
	'Update',
);

	$this->menu=array(
	//array('label'=>'List SettingGeneral','url'=>array('index')),
	array('label'=>'Manage SettingGeneral','url'=>array('setting/general')),
	array('label'=>'Create SettingGeneral','url'=>array('setting/generalcreate')),
	array('label'=>'View SettingGeneral','url'=>array('setting/generalview','id'=>$model->id_setting_general)),
	array('label'=>'Update SettingGeneral','url'=>array('setting/generalupdate','id'=>$model->id_setting_general)),
	
	);
	?>


	<h4>Update Setting General<font color=#BD362F> #<?php echo $model->field_name; ?> </font> </h4>
	<hr>

<?php echo $this->renderPartial('../settinggeneral/_form',array('model'=>$model)); ?>