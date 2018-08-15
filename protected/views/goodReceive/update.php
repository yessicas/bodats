<?php
$this->breadcrumbs=array(
	'Good Receives'=>array('index'),
	$model->id_good_receive=>array('view','id'=>$model->id_good_receive),
	'Update',
);

	$this->menu=array(
	array('label'=>'Fuel Good Receive','url'=>array('goodReceive/admingrfuel')),
	array('label'=>'Fuel Good Receive - Detail','url'=>array('goodReceive/grfuel/id/'.$id_purchase_order_detail)),
	array('label'=>'Update Fuel Good Receive','url'=>array('goodReceive/update/id/'), 'active'=>true),
	);
	?>


	<div id="content">
	<h2>Update Good Receive <?php echo $model->receive_by; ?></h2>
	<hr>
</div>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>