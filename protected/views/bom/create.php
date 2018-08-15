<?php
$this->breadcrumbs=array(
	'Boms'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Bom','url'=>array('admin')),
array('label'=>'Create Bom','url'=>array('create'),'active'=>true),

);
?>
<div id="content">
<h2>Create Bom</h2>
<hr>
</div>


<?php echo $this->renderPartial('../Bom/_form', array('model'=>$model)); ?>