<?php
$this->breadcrumbs=array(
	'Good Receives'=>array('index'),
	'Create',
);

	$this->menu=array(
	array('label'=>'Consumable Stock GR/GI','url'=>array('goodReceive/admingrcs')),
	array('label'=>'Cons.Stock Good Issue - Detail','url'=>array('goodIssue/gics/id/'.$id_purchase_order_detail), 'active'=>false),
	array('label'=>'Add Detail Cons.Stock Issue (GI)','url'=>array('goodIssue/creategics/id/'.$id_purchase_order_detail), 'active'=>true),
	);
?>

<div id="content">
<h2>Add Cons.Stock Good Issue (GI)</h2>
<hr>
</div>

<?php echo $this->renderPartial('_formgics', array('model'=>$model)); ?>