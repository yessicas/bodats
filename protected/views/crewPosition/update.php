<?php
$this->breadcrumbs=array(
	'Crew Positions'=>array('index'),
	$model->id_crew_position=>array('view','id'=>$model->id_crew_position),
	'Update',
);

	$this->menu=array(
	// array('label'=>'List CrewPosition','url'=>array('index')),
array('label'=>'Manage Crew Position','url'=>array('master/mascrew')),
array('label'=>'Create Crew Position','url'=>array('master/mascrewcreate')),
array('label'=>'View Crew Position','url'=>array('master/mascrewview','id'=>$model->id_crew_position)),
array('label'=>'Update Crew Position','url'=>array('master/mascrewupdate','id'=>$model->id_crew_position),'active'=>true),

array('label'=>'Delete Crew Position','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_crew_position),'confirm'=>'Are you sure you want to delete this item?')),
	
	);
	?>

	<h3>Update Crew Position<font color=#BD362F> <?php echo $model->crew_position; ?></font></h3>
	<hr>

<?php echo $this->renderPartial('../CrewPosition/_form',array('model'=>$model)); ?>