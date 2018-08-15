<?php
$this->breadcrumbs=array(
	'Schedule Plans'=>array('admin'),
	$model->id_schedule_plan,
);

$this->menu=array(
//array('label'=>'List SchedulePlan','url'=>array('index')),
array('label'=>'Manage SchedulePlan','url'=>array('admin')),
array('label'=>'Tambah SchedulePlan','url'=>array('create')),
array('label'=>'Lihat SchedulePlan','url'=>array('view','id'=>$model->id_schedule_plan),'active'=>true),
array('label'=>'Ubah SchedulePlan','url'=>array('update','id'=>$model->id_schedule_plan)),

array('label'=>'Hapus SchedulePlan','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_schedule_plan),'confirm'=>'Are you sure you want to delete this item?')),

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

<h1>Lihat SchedulePlan<font color=#96E400> #<?php echo $model->id_schedule_plan; ?></font></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_schedule_plan',
		'VesselTugId',
		'VesselBargeId',
		'id_voyage_activity_group',
		'schedule_date',
		'schedule_number',
		'sch_month',
		'sch_year',
		'created_date',
		'created_user',
		'ip_user_updated',
),
)); ?>
