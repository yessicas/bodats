<?php
$this->breadcrumbs=array(
	'Good Receives'=>array('index'),
	'Create',
);

	$this->menu=array(
	array('label'=>'Fuel Good Receive & Good Issue','url'=>array('goodReceive/admingrfuel')),
	array('label'=>'Fuel Good Receive - Detail','url'=>array('goodReceive/grfuel/id/'.$id_purchase_order_detail)),
	array('label'=>'Add Detail Fuel Receive','url'=>array('goodReceive/Creategrfuel/id/'.$id_purchase_order_detail), 'active'=>true),
	);
?>

<div id="content">
<h2>Add Fuel Good Receive (GR)</h2>
<hr>
</div>

<?php echo $this->renderPartial('_formgrfuel', array('model'=>$model)); ?>