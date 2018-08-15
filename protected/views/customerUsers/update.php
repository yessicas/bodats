<?php
$this->breadcrumbs=array(
	'Customer Users'=>array('index'),
	$model->id_customer_user=>array('view','id'=>$model->id_customer_user),
	'Update',
);

	$this->menu=array(
	array('label'=>'Manage Customer Users','url'=>array('zone/masuserof')),
	array('label'=>'Create Customer Users','url'=>array('customerusers/create2')),
	array('label'=>'View Customer Users','url'=>array('zone/masuserofview','id'=>$model->id_customer_user)),
	array('label'=>'Update Customer Users','url'=>array('zone/masuserofupdate','id'=>$model->id_customer_user)),
	array('label'=>'Delete Customer Users','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_customer_user),'confirm'=>'Are you sure you want to delete this item?')),

	
	);
	?>
<div id="content">
	<h2>Update Customer Users<font color=#BD362F> # <?php echo $model->Customer->CompanyName; ?></font></h2>
	<hr>
</div>
<?php echo $this->renderPartial('../CustomerUsers/_form_update',array('model'=>$model)); ?>