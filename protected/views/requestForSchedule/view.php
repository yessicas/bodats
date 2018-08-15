<?php
$this->breadcrumbs=array(
	'Request For Schedules'=>array('index'),
	$model->id_request_for_schedule,
);

$this->menu=array(
//array('label'=>'List RequestForSchedule','url'=>array('index')),
array('label'=>'Manage RequestForSchedule','url'=>array('admin')),
array('label'=>'Create RequestForSchedule','url'=>array('create')),
array('label'=>'View RequestForSchedule','url'=>array('view','id'=>$model->id_request_for_schedule)),
array('label'=>'Update RequestForSchedule','url'=>array('update','id'=>$model->id_request_for_schedule)),

array('label'=>'Delete RequestForSchedule','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_request_for_schedule),'confirm'=>'Are you sure you want to delete this item?')),

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

<h3>View Request For Schedule<font color=#BD362F> #<?php echo $model->vessel->VesselName; ?></font></h3>


<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_request_for_schedule',
	array('label'=>'Vessel',
				  'value'=>$model->vessel->VesselName),

		//'id_vessel',
	array('label'=>'Vessel Status',
				  'value'=>$model->vesselstat->vessel_status),
	//	'id_vessel_status',
		'status_rfs',
		array(
            'name'=>'StartDate',
           'value'=>Yii::app()->dateFormatter->formatDateTime($model->StartDate, "medium",""),
           ),
		//'StartDate',
		array(
            'name'=>'EndDate',
           'value'=>Yii::app()->dateFormatter->formatDateTime($model->EndDate, "medium",""),
           ),
		//'EndDate',
		'notes',
		//'id_schedule',
		//'created_date',
		//'created_user',
		//'ip_user_updated',
),
)); ?>
