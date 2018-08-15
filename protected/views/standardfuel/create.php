<?php
$this->breadcrumbs=array(
	'Standard Fuels'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Standard Fuel','url'=>array('standardfuel/admin')),
array('label'=>'Create Standard Fuel','url'=>array('standardfuel/create')),
);
?>
<div id="content">
<h2>Create StandardFuel</h2>
<hr>
</div>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>