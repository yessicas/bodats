<?php
$this->breadcrumbs=array(
	'Standard Fuels'=>array('index'),
	$model->id_standard_fuel,
);

$this->menu=array(
array('label'=>'List StandardFuel','url'=>array('index')),
array('label'=>'Create StandardFuel','url'=>array('create')),
array('label'=>'Update StandardFuel','url'=>array('update','id'=>$model->id_standard_fuel)),
array('label'=>'Delete StandardFuel','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_standard_fuel),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage StandardFuel','url'=>array('admin')),
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
<h2>View StandardFuel #<?php echo $model->id_standard_fuel; ?></h2>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_standard_fuel',
		'type_set_power',
		'type_set_feet',
		'JettyIdStart',
		'JettyIdEnd',
		'jarak',
		'speed_standard',
		'target_sailing_time',
		'lay_time',
		'sailing_time',
		'cycle_time',
		'total_bbm',
		'agency_rate',
		'agency_rate_id_currency',
		'type',
),
)); ?>
