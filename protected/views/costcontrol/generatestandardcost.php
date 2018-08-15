<?php
$this->breadcrumbs=array(
	'Voyage Orders'=>array('index'),
	'Manage',
);

	$this->menu=array(
		array('label'=>'Cost Control','url'=>array('costcontrol/adminvo')),
		array('label'=>'Standard Cost vs Actual Cost','url'=>array('costcontrol/generatestandardcost/id/'.$id_voyage_order), 'active'=>true),
	);

?>
<?php
	echo $this->renderPartial('_standardcostvsactual', array('id_voyage_order'=>$id_voyage_order)); 
?>

