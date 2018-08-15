<?php
$this->breadcrumbs=array(
	'Mst Metrics'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Metric','url'=>array('master/mastric')),
array('label'=>'Create Metric','url'=>array('master/mastriccreate')),

);
?>
<div id="content">
<h2>Create Metric</h2>
<hr>
</div>


<?php echo $this->renderPartial('../MstMetric/_form', array('model'=>$model)); ?>