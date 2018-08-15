<?php
$this->breadcrumbs=array(
	'Standard Vessel Costs'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Standard Fixed Cost','url'=>array('standardvesselcost/admin')),
array('label'=>'Create Standard Fixed Cost','url'=>array('standardvesselcost/create')),
);
?>
<div id="content">
<h2>Create Standard Fixed Cost</h2>
<hr>
</div>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>