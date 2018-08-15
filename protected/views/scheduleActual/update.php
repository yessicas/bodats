<?php
$this->breadcrumbs=array(
	'Schedule Actuals'=>array('admin'),
	$model->id_schedule_actual=>array('view','id'=>$model->id_schedule_actual),
	'Update',
);

	$this->menu=array(
	// array('label'=>'List ScheduleActual','url'=>array('index')),
	array('label'=>'Manage ScheduleActual','url'=>array('admin')),
	array('label'=>'Tambah ScheduleActual','url'=>array('create')),
	array('label'=>'Lihat ScheduleActual','url'=>array('view','id'=>$model->id_schedule_actual)),
	array('label'=>'Ubah ScheduleActual','url'=>array('update','id'=>$model->id_schedule_actual),'active'=>true),
	
	);
	?>

	<h1>Ubah ScheduleActual<font color=#96E400> #<?php echo $model->id_schedule_actual; ?></font></h1>

<?php echo $this->renderPartial('../ScheduleActual/_form',array('model'=>$model)); ?>