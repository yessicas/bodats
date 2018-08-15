<?php
$this->breadcrumbs=array(
	'Part Levels'=>array('index'),
	$model->id_part_level,
);

$this->menu=array(
//array('label'=>'List PartLevel','url'=>array('index')),
array('label'=>'Manage Part Level','url'=>array('admin')),
array('label'=>'Create Part Level','url'=>array('create')),
array('label'=>'View Part Level','url'=>array('view','id'=>$model->id_part_level)),
array('label'=>'Update Part Level','url'=>array('update','id'=>$model->id_part_level)),

array('label'=>'Delete Part Level','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_part_level),'confirm'=>'Are you sure you want to delete this item?')),

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

<h3>View Part Level<font color=#BD362F> #<?php echo $model->part_level_name; ?></font></h3>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_part_level',
		'part_level_name',
),
)); ?>
