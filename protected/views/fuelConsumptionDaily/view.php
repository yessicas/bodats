<?php
$this->breadcrumbs=array(
	'Fuel Consumption Dailies'=>array('index'),
	$model->id_fuel_consumption_daily,
);

$this->menu=array(
//array('label'=>'List FuelConsumptionDaily','url'=>array('index')),
array('label'=>'Manage Fuel Consumption Daily','url'=>array('fuelconsumptiondaily/admin')),
//array('label'=>'Create FuelConsumptionDaily','url'=>array('create')),
array('label'=>'View Fuel Consumption Daily','url'=>array('fuelconsumptiondaily/view','id'=>$model->id_fuel_consumption_daily)),
//array('label'=>'Update FuelConsumptionDaily','url'=>array('update','id'=>$model->id_fuel_consumption_daily)),

//array('label'=>'Delete FuelConsumptionDaily','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_fuel_consumption_daily),'confirm'=>'Are you sure you want to delete this item?')),

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
<!--<div id="content"> !-->
<h3>View Fuel Consumption Daily<font color=#BD362F> #<?php echo $model->idVessel->VesselName; ?></font></h3>
<hr>
<!-- </div> !-->
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_fuel_consumption_daily',
	array(
            'name'=>'log_date',
           'value'=>Yii::app()->dateFormatter->formatDateTime($model->log_date, "medium",""),
           ),
		//'log_date',
		//'id_vessel',
		array('label'=>'Vessel Tug',
				  'value'=>$model->idVessel->VesselName),

		array('label'=>'Last Value',
			'value'=>NumberAndCurrency::formatCurrency($model->last_fuel_remain)),
		//'last_fuel_remain',
		'status_remain',
		//'last_longitude',
		//'last_latitude',
		array('label'=>'Position',
				  'value'=>$model->idJetty->JettyName),
		//'NearestJettyId',
		//'NearestDistancePoint',
		array('label'=>'for about',
				'value'=>$model->NearestDistancePoint."  "."km"
			),
		//'created_date',
		//'created_user',
		//'ip_user_updated',
),
)); ?>
