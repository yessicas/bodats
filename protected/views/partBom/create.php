<?php
$this->breadcrumbs=array(
	'Part Boms'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Part Bom','url'=>array('admin')),
array('label'=>'Create Part Bom','url'=>array('create'),'active'=>true),

);
?>
<div id="content">
<h2>Create Part Bom</h2>
<hr>
</div>


<?php echo $this->renderPartial('../PartBom/_form', array('model'=>$model)); ?>