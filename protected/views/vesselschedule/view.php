<?php
$this->breadcrumbs=array(
	'Vessel Schedules'=>array('index'),
	$model->id_vessel_schedule,
);

$this->menu=array(
array('label'=>'List VesselSchedule','url'=>array('index')),
array('label'=>'Create VesselSchedule','url'=>array('create')),
array('label'=>'Update VesselSchedule','url'=>array('update','id'=>$model->id_vessel_schedule)),
array('label'=>'Delete VesselSchedule','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_vessel_schedule),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage VesselSchedule','url'=>array('admin')),
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
<h2>View VesselSchedule #<?php echo $model->id_vessel_schedule; ?></h2>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_vessel_schedule',
		'id_vessel',
		'date',
		'day',
		'month',
		'year',
		'id_vessel_status',
		'id_shipping_order_detail',
		'description',
		'created_date',
		'created_user',
		'ip_user_updated',
),
)); ?>
