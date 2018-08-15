<?php
$this->breadcrumbs=array(
	'Part Levels'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Part Level','url'=>array('admin')),
array('label'=>'Create Part Level','url'=>array('create'),'active'=>true),

);
?>
<div id="content">
<h2>Create Part Level</h2>
<hr>
</div>


<?php echo $this->renderPartial('../PartLevel/_form', array('model'=>$model)); ?>