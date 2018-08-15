<?php
$this->breadcrumbs=array(
	'Schedule Actuals'=>array('admin'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage ScheduleActual','url'=>array('admin')),
array('label'=>'Tambah ScheduleActual','url'=>array('create'),'active'=>true),

);
?>

<h1>Tambah ScheduleActual</h1>



<?php echo $this->renderPartial('../ScheduleActual/_form', array('model'=>$model)); ?>