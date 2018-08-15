<?php
$this->breadcrumbs=array(
	'Schedule Plans'=>array('admin'),
	'Create',
);
?>

<h1> <?php
 echo $title; ?>
 </h1>



<?php echo $this->renderPartial('../../../../views/SchedulePlan/_form',array('model'=>$model)); ?>