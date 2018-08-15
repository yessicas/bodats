<?php
$this->breadcrumbs=array(
	'Bussiness Type Orders'=>array('index'),
	$model->id_bussiness_type_order=>array('view','id'=>$model->id_bussiness_type_order),
	'Update',
);

	$this->menu=array(
	// array('label'=>'List BussinessTypeOrder','url'=>array('index')),
	array('label'=>'Manage Bussiness Type Order','url'=>array('master/mastype')),
array('label'=>'Create Bussiness Type Order','url'=>array('master/mastypecreate')),
array('label'=>'View Bussiness Type Order','url'=>array('master/mastypeview','id'=>$model->id_bussiness_type_order)),
array('label'=>'Update Bussiness Type Order','url'=>array('master/mastypeupdate','id'=>$model->id_bussiness_type_order),'active'=>true),
array('label'=>'Delete Bussiness Type Order','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_bussiness_type_order),'confirm'=>'Are you sure you want to delete this item?')),
	
	);
	?>

	<h4>Update Bussiness Type Order<font color=#BD362F> <?php echo $model->bussiness_type_order; ?></font></h4>
	<hr>

<?php echo $this->renderPartial('../BussinessTypeOrder/_form',array('model'=>$model)); ?>