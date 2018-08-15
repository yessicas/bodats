<?php
$this->breadcrumbs=array(
	'Account GLs'=>array('index'),
	$model->id_account_gl=>array('view','id'=>$model->id_account_gl),
	'Update',
);

	$this->menu=array(
	// array('label'=>'List AccountGl','url'=>array('index')),
	array('label'=>'Manage Account GL','url'=>array('admin')),
	array('label'=>'Create Account GL','url'=>array('create')),
	array('label'=>'View Account GL','url'=>array('view','id'=>$model->id_account_gl)),
	array('label'=>'Update Account GL','url'=>array('update','id'=>$model->id_account_gl)),
	
	);
	?>

	<h3>Update Account GL<font color=#BD362F> <?php echo $model->gl_name; ?></font></h3>

<?php echo $this->renderPartial('../AccountGl/_form',array('model'=>$model)); ?>