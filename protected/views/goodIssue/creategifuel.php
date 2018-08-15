<?php
$this->breadcrumbs=array(
	'Good Receives'=>array('index'),
	'Create',
);

	$this->menu=array(
	array('label'=>'Fuel Good Receive & Good Issue','url'=>array('goodReceive/admingrfuel')),
	array('label'=>'Fuel Good Issue - Detail','url'=>array('goodIssue/gifuel/id/'.$id_purchase_order_detail), 'active'=>false),
	array('label'=>'Add Detail Fuel Issue (GI)','url'=>array('goodIssue/Creategifuel/id/'.$id_purchase_order_detail), 'active'=>true),
	);
?>

<div id="content">
<h2>Add Fuel Good Issue (GI)</h2>
<hr>
</div>

<?php echo $this->renderPartial('_formgifuel', array('model'=>$model)); ?>