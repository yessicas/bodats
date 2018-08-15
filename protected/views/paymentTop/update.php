<?php
$this->breadcrumbs=array(
	'Payment Tops'=>array('index'),
	$model->id_payment_top=>array('view','id'=>$model->id_payment_top),
	'Update',
);

	$this->menu=array(
	array('label'=>'Update PaymentTop','url'=>array('master/maspayupdate')),
	array('label'=>'Create PaymentTop','url'=>array('create')),
	array('label'=>'View PaymentTop','url'=>array('view','id'=>$model->id_payment_top)),
	array('label'=>'Manage PaymentTop','url'=>array('admin')),
	);
	?>

	<!--- <div id="content"> !---->

	<h3>Update PaymentTop # <font color="#BD362F"><?php echo $model->payment_top; ?></font></h3>
	<hr>

<?php echo $this->renderPartial('../paymentTop/_form',array('model'=>$model)); ?>