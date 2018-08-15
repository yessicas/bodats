<?php
$this->breadcrumbs=array(
	'Mst Metric Prs'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Metric PR','url'=>array('master/maspr')),
array('label'=>'Create Metric PR','url'=>array('master/masprcreate')),

);
?>
<div id="content">
<h2>Create Metric PR</h2>
<hr>
</div>


<?php echo $this->renderPartial('../MstMetricPr/_form', array('model'=>$model)); ?>