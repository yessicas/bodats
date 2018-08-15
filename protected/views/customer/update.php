<?php
$this->breadcrumbs=array(
	'Customers'=>array('index'),
	$model->id_customer=>array('view','id'=>$model->id_customer),
	'Update',
);

	$this->menu=array(
	array('label'=>'Manage Customer','url'=>array('custvend/cust')),
	array('label'=>'Create Customer','url'=>array('custvend/custcreate')),
	array('label'=>'View Customer','url'=>array('custvend/custview','id'=>$model->id_customer)),
	array('label'=>'Update Customer','url'=>array('custvend/custupdate','id'=>$model->id_customer)),
	);
	?>

<div id="content">
	<h2>Update Customer <font color="#BD362F"> # <?php echo $model->CompanyName; ?></font></h2>
	<hr>
</div>
<?php echo $this->renderPartial('../customer/_form',array('model'=>$model)); ?>