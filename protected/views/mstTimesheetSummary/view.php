<?php
$this->breadcrumbs=array(
	'Mst Timesheet Summaries'=>array('index'),
	$model->id_mst_timesheet_summary,
);

$this->menu=array(
//array('label'=>'List MstTimesheetSummary','url'=>array('index')),
array('label'=>'Manage MstTimesheetSummary','url'=>array('master/times')),
array('label'=>'Create MstTimesheetSummary','url'=>array('master/timescreate')),
array('label'=>'View MstTimesheetSummary','url'=>array('master/timesview','id'=>$model->id_mst_timesheet_summary),'active'=>true),
array('label'=>'Update MstTimesheetSummary','url'=>array('master/timesupdate','id'=>$model->id_mst_timesheet_summary)),

array('label'=>'Delete MstTimesheetSummary','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_mst_timesheet_summary),'confirm'=>'Are you sure you want to delete this item?')),

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

<h3>View Timesheet Summary<font color=#BD362F> #<?php echo $model->timesheet_summary; ?></font></h3>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_mst_timesheet_summary',
		'timesheet_summary',
		array(

		'label'=>'Is Active',
		//'value'=>$model->Status=='1' ? 'Used' : 'Unused',  
		'value'=>MstTimesheetSummary::model()->statusAktiv($model->is_active),  

		),
		//'is_active',
),
)); ?>
