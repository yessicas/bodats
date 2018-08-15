<?php
$this->breadcrumbs=array(
	'Part Structures'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Part Structure','url'=>array('admin')),
array('label'=>'Create Part Structure','url'=>array('create'),'active'=>true),

);
?>
<div id="content">
<h2>Create Part Structure</h2>
<hr>
</div>


<?php echo $this->renderPartial('../PartStructure/_form', array('model'=>$model)); ?>