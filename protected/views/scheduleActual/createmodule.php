<?php
$this->breadcrumbs=array(
	'Schedule Actuals'=>array('admin'),
	'Create',
);
?>

<h1> <?php
 echo $title; ?>
 </h1>



<?php echo $this->renderPartial('../../../../views/ScheduleActual/_form',array('model'=>$model)); ?>