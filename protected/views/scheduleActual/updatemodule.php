
<?php
$this->breadcrumbs=array(
	'Schedule Actuals'=>array('admin'),
	$model->id_schedule_actual=>array('view','id'=>$model->id_schedule_actual),
	'Update',
);
?>



<h1> <?php
 echo $title; ?>

<font color=#D26A48> #<?php echo $model->id_schedule_actual; ?></font></h1>

<?php echo $this->renderPartial('../../../../views/ScheduleActual/_form',array('model'=>$model)); ?>