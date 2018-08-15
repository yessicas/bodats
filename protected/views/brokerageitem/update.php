<?php
$this->breadcrumbs=array(
	'Brokerage Items'=>array('index'),
	$model->id_brokerage_item=>array('view','id'=>$model->id_brokerage_item),
	'Update',
);

	$this->menu=array(
	array('label'=>'Manage Brokerage Item','url'=>array('master/masbrok')),
	array('label'=>'Create Brokerage Item','url'=>array('master/masbrokcreate')),
	array('label'=>'View Brokerage Item','url'=>array('view','id'=>$model->id_brokerage_item)),
	array('label'=>'Update Brokerage Item','url'=>array('update','id'=>$model->id_brokerage_item),'active'=>true),
	array('label'=>'Delete Brokerage Item','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_brokerage_item),'confirm'=>'Are you sure you want to delete this item?')),

	);
	?>

	<h3>Update BrokerageItem <font color="#BD362F"> # <?php echo $model->brokerage_item; ?></font></h3>
	<hr>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>