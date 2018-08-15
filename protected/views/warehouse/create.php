<?php
$this->breadcrumbs=array(
	'Warehouses'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Warehouse','url'=>array('admin')),
array('label'=>'Create Warehouse','url'=>array('create'),'active'=>true),

);
?>
<div id="content">
<h2>Create Warehouse</h2>
<hr>
</div>


<?php echo $this->renderPartial('../Warehouse/_form', array('model'=>$model)); ?>