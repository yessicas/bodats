<?php
$this->breadcrumbs=array(
	'Crew Positions'=>array('index'),
	$model->id_crew_position,
);

$this->menu=array(
//array('label'=>'List CrewPosition','url'=>array('index')),
array('label'=>'Manage Crew Position','url'=>array('master/mascrew')),
array('label'=>'Create Crew Position','url'=>array('master/mascrewcreate')),
array('label'=>'View Crew Position','url'=>array('master/mascrewview','id'=>$model->id_crew_position),'active'=>true),
array('label'=>'Update Crew Position','url'=>array('master/mascrewupdate','id'=>$model->id_crew_position)),

array('label'=>'Delete Crew Position','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_crew_position),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<?php
if(Yii::app()->user->hasFlash('success')):?>

<div class = "animated flash">
	<?php
    $this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true,
    'fade' => true,
    'closeText' => '&times;', // false equals no close link
    'alerts' => array( // configurations per alert type
        // success, info, warning, error or danger
        'success' => array('closeText' => '&times;'), 

    ),
	));
	?>
</div>

<?php endif; ?>

<h3>View Crew Position<font color=#BD362F> #<?php echo $model->crew_position; ?></font></h3>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_crew_position',
		'crew_position',
		'minimum_req',
		'description',
),
)); ?>
