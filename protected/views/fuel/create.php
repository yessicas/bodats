<?php
$this->breadcrumbs=array(
	'Fuels'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Fuel','url'=>array('index')),
array('label'=>'Manage Fuel','url'=>array('admin')),
);
?>
<div id="content">
<h2>Create Fuel</h2>
<hr>
</div>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>