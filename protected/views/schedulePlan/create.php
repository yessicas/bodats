<?php
$this->breadcrumbs=array(
	'Schedule Plans'=>array('admin'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage SchedulePlan','url'=>array('admin')),
array('label'=>'Tambah SchedulePlan','url'=>array('create'),'active'=>true),

);
?>

<h1>Tambah SchedulePlan</h1>



<?php echo $this->renderPartial('../SchedulePlan/_form', array('model'=>$model)); ?>