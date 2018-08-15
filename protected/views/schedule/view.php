<?php
$this->breadcrumbs=array(
	'Schedules'=>array('index'),
	$model->id_schedule,
);

$this->menu=array(
//array('label'=>'List Schedule','url'=>array('index')),
array('label'=>'Manage Schedule','url'=>array('admin')),
array('label'=>'Create Schedule','url'=>array('create')),
array('label'=>'View Schedule','url'=>array('view','id'=>$model->id_schedule)),
array('label'=>'Update Schedule','url'=>array('update','id'=>$model->id_schedule)),

array('label'=>'Delete Schedule','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_schedule),'confirm'=>'Are you sure you want to delete this item?')),

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

<h3>View Schedule<font color=#BD362F> #<?php echo $model->id_schedule; ?></font></h3>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_schedule',
	array('label'=>'Vessel Tug',
				  'value'=>$model->vesseltug->VesselName),

	array('label'=>'Vessel Barge',
				  'value'=>$model->vesselbarge->VesselName),
		//'VesselTugId',
		//'VesselBargeId',
	array('label'=>'Vessel Status',
				  'value'=>$model->status->vessel_status),

		//'id_vessel_status',
	array(
            'name'=>'StartDate',
           'value'=>Yii::app()->dateFormatter->formatDateTime($model->StartDate, "medium",""),
           ),
		//'StartDate',
	array(
            'name'=>'EndDate',
           'value'=>Yii::app()->dateFormatter->formatDateTime($model->EndDate, "medium",""),
           ),
		/*'EndDate',
		'created_date',
		'created_user',
		'ip_user_updated',
		*/
),
)); ?>
