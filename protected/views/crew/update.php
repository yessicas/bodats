<?php
$this->breadcrumbs=array(
	'Crews'=>array('index'),
	$model->CrewId=>array('view','id'=>$model->CrewId),
	'Update',
);

	$this->menu=array(
	array('label'=>'Manage Crew','url'=>array('cre/crew')),
	array('label'=>'Create Crew','url'=>array('cre/crewcreate')),
	array('label'=>'View Crew','url'=>array('cre/crewview','id'=>$model->CrewId)),
	array('label'=>'Update Crew','url'=>array('cre/crewupdate','id'=>$model->CrewId)),
	);
	?>


<div id="content">
<h2>Update Crew <font color="#BD362F"> <?php echo $model->CrewName; ?></font></h2>
<hr>
</div>

<?php echo $this->renderPartial('../crew/_form',array('model'=>$model)); ?>