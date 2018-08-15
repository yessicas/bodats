<?php
$this->breadcrumbs=array(
	'Fuel Price Histories'=>array('index'),
	$model->id_fuel_price_history,
);

$this->menu=array(
array('label'=>'List FuelPriceHistory','url'=>array('index')),
array('label'=>'Create FuelPriceHistory','url'=>array('create')),
array('label'=>'Update FuelPriceHistory','url'=>array('update','id'=>$model->id_fuel_price_history)),
array('label'=>'Delete FuelPriceHistory','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_fuel_price_history),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage FuelPriceHistory','url'=>array('admin')),
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
<h2>View FuelPriceHistory #<?php echo $model->id_fuel_price_history; ?></h2>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_fuel_price_history',
		'id_currency',
		'fuel_price',
		'created_date',
		'created_user',
		'ip_user_updated',
),
)); ?>
