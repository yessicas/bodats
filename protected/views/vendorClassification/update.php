<?php
$this->breadcrumbs=array(
	'Vendor Classifications'=>array('index'),
	$model->id_vendor_classification=>array('view','id'=>$model->id_vendor_classification),
	'Update',
);

	$this->menu=array(
	// array('label'=>'List VendorClassification','url'=>array('index')),
	array('label'=>'Manage VendorClassification','url'=>array('admin')),
	array('label'=>'Create VendorClassification','url'=>array('create')),
	array('label'=>'View VendorClassification','url'=>array('view','id'=>$model->id_vendor_classification)),
	array('label'=>'Update VendorClassification','url'=>array('update','id'=>$model->id_vendor_classification)),
	
	);
	?>

	<h3>Update Vendor Classification<font color=#BD362F> <?php echo $model->namavendor->VendorName; ?></font></h3>
	<hr>

<?php echo $this->renderPartial('../VendorClassification/_form_update',array('model'=>$model)); ?>