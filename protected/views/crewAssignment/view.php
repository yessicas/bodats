<?php
$this->breadcrumbs=array(
	'Crew Assignments'=>array('index'),
	$model->id_crew_assignment,
);

$this->menu=array(
array('label'=>'List Crew Assignment','url'=>array('index')),
array('label'=>'Create Crew Assignment','url'=>array('create')),
array('label'=>'Update Crew Assignment','url'=>array('update','id'=>$model->id_crew_assignment)),
array('label'=>'Delete Crew Assignment','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_crew_assignment),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Crew Assignment','url'=>array('admin')),
);
?>

<h1>View Crew Assignment #<?php echo $model->id_crew_assignment; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_crew_assignment',
		'vessel_id',
		'CrewId',
		'id_crew_position',
		'start_date',
		'expired_date',
		'status_active',
		'created_date',
		'created_user',
		'ip_user_updated',
),
)); ?>
