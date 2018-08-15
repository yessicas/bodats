<?php
$this->breadcrumbs=array(
	'Bank Accounts'=>array('index'),
	$model->id_bank_account=>array('view','id'=>$model->id_bank_account),
	'Update',
);

	$this->menu=array(
	// array('label'=>'List BankAccount','url'=>array('index')),
	array('label'=>'Manage BankAccount','url'=>array('admin')),
	array('label'=>'Create BankAccount','url'=>array('create')),
	array('label'=>'View BankAccount','url'=>array('view','id'=>$model->id_bank_account)),
	array('label'=>'Update BankAccount','url'=>array('update','id'=>$model->id_bank_account),'active'=>true),
	array('label'=>'Delete BankAccount','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_bank_account),'confirm'=>'Are you sure you want to delete this item?')),
	
	);
	?>
<div id="content">
	<h2>Update BankAccount<font color=#BD362F> <?php echo $model->id_bank_account; ?></font></h2>
	<hr>
</div>
<?php echo $this->renderPartial('../BankAccount/_form',array('model'=>$model)); ?>