<?php
$this->breadcrumbs=array(
	'Voyage Orders'=>array('index'),
	'Manage',
);

	$this->menu=array(
		array('label'=>'Actual Sales Report','url'=>array('actualsalesreport/actualpervoyage')),
		array('label'=>'Report Per Voyage','url'=>array('actualsalesreport/detailpervoyage/', 'id'=>$id_voyage_order), 'active'=>true),
	);

?>
<?php
	echo $this->renderPartial('/costcontrol/_standardcostvsactual', array('id_voyage_order'=>$id_voyage_order)); 
?>

