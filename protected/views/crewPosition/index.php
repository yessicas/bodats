<?php
$this->breadcrumbs=array(
	'Crew Positions',
);

$this->menu=array(
array('label'=>'Create Crew Position','url'=>array('create')),
array('label'=>'Manage Crew Position','url'=>array('admin')),
);
?>
<div id="content">
<h2>Crew Positions</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
