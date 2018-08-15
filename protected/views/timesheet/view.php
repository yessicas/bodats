<?php
$this->breadcrumbs=array(
	'Timesheets'=>array('index'),
	$model->id_timesheet,
);

$this->menu=array(
array('label'=>'List Timesheet','url'=>array('index')),
array('label'=>'Create Timesheet','url'=>array('create')),
array('label'=>'Update Timesheet','url'=>array('update','id'=>$model->id_timesheet)),
array('label'=>'Delete Timesheet','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_timesheet),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Timesheet','url'=>array('admin')),
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
<h2>View Timesheet #<?php echo $model->id_timesheet; ?></h2>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_timesheet',
		'id_voyage_order',
		'id_voyage_activity',
		'Activity',
		'StartDate',
		'Duration',
		'Remarks',
		'updated_date',
		'updated_user',
		'ip_user_updated',
),
)); ?>
