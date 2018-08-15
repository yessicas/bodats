<?php
$this->breadcrumbs=array(
	'Setting Quotation Reports'=>array('index'),
	$model->id_setting_quotation_report=>array('view','id'=>$model->id_setting_quotation_report),
	'Update',
);
?>

<?php

	$this->menu=array(
	array('label'=>'Manage Setting Quotation Report','url'=>array('setting/quot')),
	array('label'=>'Create Setting Quotation Report','url'=>array('setting/quotcreate')),
	
	array('label'=>'View Setting Quotation Report','url'=>array('setting/quotview','id'=>$model->id_setting_quotation_report)),
	array('label'=>'Update Setting Quotation Report','url'=>array('setting/quotupdate','id'=>$model->id_setting_quotation_report)),
	array('label'=>'Delete Setting Quotation Report','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_setting_quotation_report),'confirm'=>'Are you sure you want to delete this item?')),
	
	);
	?>

<div id="content">
	<h2>Update Setting Quotation Report<font color=#BD362F> <?php echo $model->id_setting_quotation_report; ?></font></h2>
	<hr>
</div>
<?php echo $this->renderPartial('../SettingQuotationReport/_form',array('model'=>$model)); ?>