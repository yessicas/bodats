<?php
$this->breadcrumbs=array(
	'Standard Vessel Brokerages'=>array('index'),
	'Create',
);

//$this->menu=array(
//array('label'=>'List StandardVesselBrokerage','url'=>array('index')),
//array('label'=>'Manage StandardVesselBrokerage','url'=>array('admin')),
//);

$this->menu=array(
//array('label'=>'Manage Standard Vessel Cost','url'=>array('standardvesselcost/admin')),
array('label'=>'Detail Brokerage Fee','url'=>array('standardvesselbrokerage/viewdetail','id'=>$_GET['id'])),
array('label'=>'Add Detail Brokerage Fee','url'=>array('standardvesselbrokerage/create','id'=>$_GET['id'])),
);

?>
<div id="content">
<h2>Add Detail Brokerage Fee <?php echo $modelVesselCost->Vessel->VesselName ?></h2>
<hr>
</div>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>