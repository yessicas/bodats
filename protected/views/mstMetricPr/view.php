<?php
$this->breadcrumbs=array(
	'Mst Metric PRs'=>array('index'),
	$model->metric,
);

$this->menu=array(
//array('label'=>'List MstMetricPr','url'=>array('index')),
array('label'=>'Manage Mst Metric PR','url'=>array('master/maspr')),
array('label'=>'Create Mst Metric PR','url'=>array('master/masprcreate')),
array('label'=>'View Mst Metric PR','url'=>array('master/masprview','id'=>$model->metric),'active'=>true),
array('label'=>'Update Mst Metric PR','url'=>array('master/masprupdate','id'=>$model->metric)),

array('label'=>'Delete Mst Metric PR','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->metric),'confirm'=>'Are you sure you want to delete this item?')),

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

<h3>View Metric PR<font color=#BD362F> #<?php echo $model->metric; ?></font></h3>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'metric',
		'metric_name',
		'id_po_category',
		'description',
),
)); ?>
