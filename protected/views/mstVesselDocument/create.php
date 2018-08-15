<?php
$this->breadcrumbs=array(
	'Mst Vessel Documents'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Vessel Document','url'=>array('master/masdoc')),
array('label'=>'Create Vessel Document','url'=>array('master/masdoccreate')),
);
?>
<div id="content">
<h2>Create Vessel Document</h2>
<hr>
</div>


<?php echo $this->renderPartial('../MstVesselDocument/_form', array('model'=>$model)); ?>