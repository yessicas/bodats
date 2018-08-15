<?php
$this->breadcrumbs=array(
	'Setting Invoice Reports'=>array('index'),
	$model->id_setting_quotation_report=>array('view','id'=>$model->id_setting_quotation_report),
	'Update',
);

	$this->menu=array(
	// array('label'=>'List SettingInvoiceReport','url'=>array('index')),
	array('label'=>'Manage Setting Invoice Report','url'=>array('setting/invo')),
	array('label'=>'Create Setting Invoice Report','url'=>array('setting/invocreate')),
	array('label'=>'View Setting Invoice Report','url'=>array('setting/invoview','id'=>$model->id_setting_quotation_report)),
	array('label'=>'Update Setting Invoice Report','url'=>array('setting/invoupdate','id'=>$model->id_setting_quotation_report)),
	array('label'=>'Delete Setting Invoice Report','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_setting_quotation_report),'confirm'=>'Are you sure you want to delete this item?')),
	
	);
	?>

	<h3>Update Setting Invoice Report<font color=#BD362F> <?php echo $model->field_name; ?></font></h3>
	<hr>
<?php echo $this->renderPartial('../SettingInvoiceReport/_form',array('model'=>$model)); ?>