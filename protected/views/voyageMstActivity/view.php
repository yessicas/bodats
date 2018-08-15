<?php
$this->breadcrumbs=array(
	'Voyage Mst Activities'=>array('index'),
	$model->id_voyage_activity,
);

$this->menu=array(
//array('label'=>'List VoyageMstActivity','url'=>array('index')),
array('label'=>'Manage VoyageMstActivity','url'=>array('admin')),
array('label'=>'Create VoyageMstActivity','url'=>array('create')),
array('label'=>'View VoyageMstActivity','url'=>array('view','id'=>$model->id_voyage_activity)),
array('label'=>'Update VoyageMstActivity','url'=>array('update','id'=>$model->id_voyage_activity)),

array('label'=>'Delete VoyageMstActivity','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_voyage_activity),'confirm'=>'Are you sure you want to delete this item?')),

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

<h4>View Voyage Activity<font color=#BD362F> #<?php echo $model->voyage_activity_desc; ?></font></h4>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_voyage_activity',
		'voyage_activity',
		'voyage_activity_desc',
		'color',
),
)); ?>
