<?php
$this->breadcrumbs=array(
	'Account COAs'=>array('index'),
	$model->id_account_coa=>array('view','id'=>$model->id_account_coa),
	'Update',
);

	$this->menu=array(
	// array('label'=>'List AccountCoa','url'=>array('index')),
	array('label'=>'Manage Account COA','url'=>array('admin')),
	array('label'=>'Create Account COA','url'=>array('create')),
	array('label'=>'View Account COA','url'=>array('view','id'=>$model->id_account_coa)),
	array('label'=>'Update Account COA','url'=>array('update','id'=>$model->id_account_coa)),
	
	);
	?>

	<h3>Update Account COA<font color=#BD362F> <?php echo $model->account_name; ?></font></h3>
	
<?php echo $this->renderPartial('../AccountCoa/_form',array('model'=>$model)); ?>