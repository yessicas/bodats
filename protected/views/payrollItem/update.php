<?php
$this->breadcrumbs=array(
	'Payroll Items'=>array('index'),
	$model->id_payroll_item=>array('view','id'=>$model->id_payroll_item),
	'Update',
);

	$this->menu=array(
	// array('label'=>'List PayrollItem','url'=>array('index')),
	array('label'=>'Manage Payroll Item','url'=>array('master/masrol')),
array('label'=>'Create Payroll Item','url'=>array('master/masrolcreate')),
array('label'=>'View Payroll Item','url'=>array('view','id'=>$model->id_payroll_item)),
array('label'=>'Update Payroll Item','url'=>array('update','id'=>$model->id_payroll_item),'active'=>true),

array('label'=>'Delete Payroll Item','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_payroll_item),'confirm'=>'Are you sure you want to delete this item?')),

	
	);
	?>

	<h3>Update Payroll Item <font color=#BD362F> <?php echo $model->payroll_item; ?></font></h3>
	

<?php echo $this->renderPartial('../PayrollItem/_form',array('model'=>$model)); ?>