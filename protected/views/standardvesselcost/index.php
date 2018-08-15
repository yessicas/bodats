<?php
$this->breadcrumbs=array(
	'Standard Vessel Costs',
);

$this->menu=array(
array('label'=>'Create StandardVesselCost','url'=>array('create')),
array('label'=>'Manage StandardVesselCost','url'=>array('admin')),
);
?>
<div id="content">
<h2>Standard Vessel Costs</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
