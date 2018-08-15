<?php
$this->breadcrumbs=array(
	'Vessel Statuses',
);

$this->menu=array(
array('label'=>'Create VesselStatus','url'=>array('create')),
array('label'=>'Manage VesselStatus','url'=>array('admin')),
);
?>
<div id="content">
<h2>Vessel Statuses</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
