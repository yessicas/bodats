<?php
$this->breadcrumbs=array(
	'Fuels'=>array('index'),
	$model->id_fuel,
);

$this->menu=array(
array('label'=>'List Fuel','url'=>array('index')),
array('label'=>'Create Fuel','url'=>array('create')),
array('label'=>'Update Fuel','url'=>array('update','id'=>$model->id_fuel)),
array('label'=>'Delete Fuel','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_fuel),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Fuel','url'=>array('admin')),
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
<h2>View Fuel #<?php echo $model->id_fuel; ?></h2>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_fuel',
		'fuel',
		'fuel_price',
		'id_currency',
		'fuel_price_updated',
		'fuel_price_updated_by',
),
)); ?>
