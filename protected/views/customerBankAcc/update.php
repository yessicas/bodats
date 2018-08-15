<?php
$this->breadcrumbs=array(
	'Customer Bank Accs'=>array('index'),
	$model->id_customer_bank_acc=>array('view','id'=>$model->id_customer_bank_acc),
	'Update',
);

	$this->menu=array(
	// array('label'=>'List CustomerBankAcc','url'=>array('index')),
	array('label'=>'Manage Customer Bank Acc','url'=>array('admin')),
	array('label'=>'Create Customer Bank Acc','url'=>array('create')),
	array('label'=>'View Customer Bank Acc','url'=>array('view','id'=>$model->id_customer_bank_acc)),
	array('label'=>'Update Customer Bank Acc','url'=>array('update','id'=>$model->id_customer_bank_acc)),
	
	);
	?>

	<h3>Update Customer Bank Acc<font color=#BD362F> <?php echo $model->AccountName; ?></font></h3>
	<hr>

<?php echo $this->renderPartial('../CustomerBankAcc/_form_update',array('model'=>$model)); ?>