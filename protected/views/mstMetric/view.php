<?php
$this->breadcrumbs=array(
	'Mst Metrics'=>array('index'),
	$model->metric,
);

$this->menu=array(
//array('label'=>'List MstMetric','url'=>array('index')),
array('label'=>'Manage Metric','url'=>array('master/mastric')),
array('label'=>'Create Metric','url'=>array('master/mastriccreate')),

array('label'=>'View Metric','url'=>array('master/mastricview','id'=>$model->metric),'active'=>true),
array('label'=>'Update Metric','url'=>array('master/mastricupdate','id'=>$model->metric)),

array('label'=>'Delete Metric','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->metric),'confirm'=>'Are you sure you want to delete this item?')),

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

<h3>View Metric<font color=#BD362F> #<?php echo $model->metric; ?></font></h3>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'metric',
		'metric_name',
		'description',
),
)); ?>
