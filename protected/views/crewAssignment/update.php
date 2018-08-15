<?php
$this->breadcrumbs=array(
	'Crew Assignments'=>array('index'),
	$model->id_crew_assignment=>array('view','id'=>$model->id_crew_assignment),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Crew Assignment','url'=>array('index')),
	array('label'=>'Create Crew Assignment','url'=>array('create')),
	array('label'=>'View Crew Assignment','url'=>array('view','id'=>$model->id_crew_assignment)),
	array('label'=>'Manage Crew Assignment','url'=>array('admin')),
	);
	?>

	<h1>Update Crew Assignment <?php echo $model->id_crew_assignment; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>