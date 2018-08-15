<?php
$this->breadcrumbs=array(
	'Standard Vessel Brokerages'=>array('index'),
	$model->id_standard_vessel_brokerage=>array('view','id'=>$model->id_standard_vessel_brokerage),
	'Update',
);

	$this->menu=array(
//array('label'=>'Manage Standard Vessel Cost','url'=>array('standardvesselcost/admin')),
array('label'=>'Detail Brokerage Fee','url'=>array('standardvesselbrokerage/viewdetail','id'=>$model->id_standard_vessel_cost)),
array('label'=>'Update  Detail Brokerage Fee','url'=>array('standardvesselbrokerage/update','id'=>$_GET['id'])),
);
	?>

<div id="content">
<h2>Update Detail Brokerage Fee <?php echo $modelVesselCost->Vessel->VesselName ?></h2>
<hr>
</div>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>