<?php
$this->breadcrumbs=array(
	'Standard Vessel Brokerages',
);

$this->menu=array(
array('label'=>'Create StandardVesselBrokerage','url'=>array('create')),
array('label'=>'Manage StandardVesselBrokerage','url'=>array('admin')),
);
?>
<div id="content">
<h2>Standard Vessel Brokerages</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
