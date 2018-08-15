
<?php
$this->breadcrumbs=array(
	'Schedule Plans'=>array('admin'),
	$model->id_schedule_plan=>array('view','id'=>$model->id_schedule_plan),
	'Update',
);
?>



<h1> <?php
 echo $title; ?>

<font color=#D26A48> #<?php echo $model->id_schedule_plan; ?></font></h1>

<?php echo $this->renderPartial('../../../../views/SchedulePlan/_form',array('model'=>$model)); ?>