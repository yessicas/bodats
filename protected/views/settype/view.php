<?php
$this->breadcrumbs=array(
	'Settype Tugbarges'=>array('index'),
	$model->id_settype_tugbarge,
);

$this->menu=array(
array('label'=>'List SettypeTugbarge','url'=>array('index')),
array('label'=>'Create SettypeTugbarge','url'=>array('create')),
array('label'=>'Update SettypeTugbarge','url'=>array('update','id'=>$model->id_settype_tugbarge)),
array('label'=>'Delete SettypeTugbarge','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_settype_tugbarge),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage SettypeTugbarge','url'=>array('admin')),
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
<h2>View SettypeTugbarge #<?php echo $model->id_settype_tugbarge; ?></h2>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_settype_tugbarge',
		'month',
		'year',
		'first_date',
		'tug',
		'barge',
		'tug_power',
		'barge_capacity',
		'settype_name',
		'voyage_number',
		'created_date',
		'created_user',
		'ip_user_updated',
),
)); ?>
