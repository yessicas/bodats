<?php
$this->breadcrumbs=array(
	'Vendor Bank Accs'=>array('index'),
	$model->id_vendor_bank_acc=>array('view','id'=>$model->id_vendor_bank_acc),
	'Update',
);

	$this->menu=array(
	// array('label'=>'List VendorBankAcc','url'=>array('index')),
	array('label'=>'Manage Vendor Bank Acc','url'=>array('admin')),
	array('label'=>'Create Vendor Bank Acc','url'=>array('create')),
	array('label'=>'View Vendor Bank Acc','url'=>array('view','id'=>$model->id_vendor_bank_acc)),
	array('label'=>'Update Vendor Bank Acc','url'=>array('update','id'=>$model->id_vendor_bank_acc)),
	
	);
	?>

	<h3>Update Vendor Bank Acc<font color=#BD362F> <?php echo $model->id_vendor_bank_acc; ?></font></h3>
	<hr>

<?php echo $this->renderPartial('../VendorBankAcc/_form_update',array('model'=>$model)); ?>