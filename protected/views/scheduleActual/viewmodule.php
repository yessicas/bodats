<?php
$this->breadcrumbs=array(
	'Schedule Actuals'=>array('admin'),
	$model->id_schedule_actual,
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

<h1> <?php
 echo $title; ?>

<font color=#7EFC65> #<?php echo $model->id_schedule_actual; ?></font></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_schedule_actual',
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
