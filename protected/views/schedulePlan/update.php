<?php
$this->breadcrumbs=array(
	'Schedule Plans'=>array('admin'),
	$model->id_schedule_plan=>array('view','id'=>$model->id_schedule_plan),
	'Update',
);

	$this->menu=array(
	// array('label'=>'List SchedulePlan','url'=>array('index')),
	array('label'=>'Manage SchedulePlan','url'=>array('admin')),
	array('label'=>'Tambah SchedulePlan','url'=>array('create')),
	array('label'=>'Lihat SchedulePlan','url'=>array('view','id'=>$model->id_schedule_plan)),
	array('label'=>'Ubah SchedulePlan','url'=>array('update','id'=>$model->id_schedule_plan),'active'=>true),
	
	);
	?>

	<h1>Ubah SchedulePlan<font color=#96E400> #<?php echo $model->id_schedule_plan; ?></font></h1>

<?php echo $this->renderPartial('../SchedulePlan/_form',array('model'=>$model)); ?>