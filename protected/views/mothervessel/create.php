<?php
$this->breadcrumbs=array(
	'Mothervessels'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Mother Vessel','url'=>array('entity/entimother')),
array('label'=>'Create Mother Vessel','url'=>array('entity/entimothercreate')),
);
?>
<div id="content">
<h2>Create Mother Vessel</h2>
<hr>
</div>


<?php echo $this->renderPartial('../mothervessel/_form', array('model'=>$model)); ?>