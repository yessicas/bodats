<?php
$this->breadcrumbs=array(
	'Vendor Categories'=>array('index'),
	$model->id_vendor_category=>array('view','id'=>$model->id_vendor_category),
	'Update',
);

	$this->menu=array(
	// array('label'=>'List VendorCategory','url'=>array('index')),
	array('label'=>'Manage VendorCategory','url'=>array('admin')),
	array('label'=>'Create VendorCategory','url'=>array('create')),
	array('label'=>'View VendorCategory','url'=>array('view','id'=>$model->id_vendor_category)),
	array('label'=>'Update VendorCategory','url'=>array('update','id'=>$model->id_vendor_category)),
	
	);
	?>
<div id="content">
	<h2>Update VendorCategory<font color=#BD362F> <?php echo $model->id_vendor_category; ?></font></h2>
	<hr>
</div>
<?php echo $this->renderPartial('../VendorCategory/_form',array('model'=>$model)); ?>