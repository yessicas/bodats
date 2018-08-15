<?php
$this->breadcrumbs=array(
	'Vessel Maintenance Plans',
);

$this->menu=array(
array('label'=>'Create VesselMaintenancePlan','url'=>array('create')),
array('label'=>'Manage VesselMaintenancePlan','url'=>array('admin')),
);
?>

<div class="well">
<h4>Vessel Maintenance Plans</h4>
<hr>
</div>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
/*
'sortableAttributes'=>array(
		'attribute1',
		'attribute2',
        ),
*/
'itemView'=>'_view',
)); ?>
