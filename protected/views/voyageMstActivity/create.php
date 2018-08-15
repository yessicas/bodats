<?php
$this->breadcrumbs=array(
	'Voyage Mst Activities'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Voyage Activity','url'=>array('master/masvoy')),
array('label'=>'Create Voyage Activity','url'=>array('master/masvoycreate')),

);
?>
<div id="content">
<h2>Create Voyage Activity</h2>
<hr>
</div>


<?php echo $this->renderPartial('../VoyageMstActivity/_form', array('model'=>$model)); ?>