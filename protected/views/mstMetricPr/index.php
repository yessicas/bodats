<?php
$this->breadcrumbs=array(
	'Mst Metric PRs',
);

$this->menu=array(
array('label'=>'Create Mst Metric PR','url'=>array('create')),
array('label'=>'Manage Mst Metric PR','url'=>array('admin')),
);
?>
<div id="content">
<h2>Mst Metric PRs</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
