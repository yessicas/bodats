<?php
$this->breadcrumbs=array(
	'Voyage Orders'=>array('index'),
	$model->id_voyage_order,
);

$this->menu=array(
array('label'=>'List VoyageOrder','url'=>array('index')),
array('label'=>'Create VoyageOrder','url'=>array('create')),
array('label'=>'Update VoyageOrder','url'=>array('update','id'=>$model->id_voyage_order)),
array('label'=>'Delete VoyageOrder','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_voyage_order),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage VoyageOrder','url'=>array('admin')),
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
<h2>View VoyageOrder #<?php echo $model->id_voyage_order; ?></h2>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_voyage_order',
		'VoyageNumber',
		'VoyageOrderNumber',
		'VONo',
		'VOMonth',
		'VOYear',
		'id_quotation',
		'id_so',
		'id_voyage_order_plan',
		'status',
		'bussiness_type_order',
		'BargingVesselTug',
		'BargingVesselBarge',
		'BargeSize',
		'Capacity',
		'TugPower',
		'BargingJettyIdStart',
		'BargingJettyIdEnd',
		'StartDate',
		'EndDate',
		'ActualStartDate',
		'ActualEndDate',
		'period_year',
		'period_month',
		'period_quartal',
		'Price',
		'id_currency',
		'change_rate',
		'fuel_price',
		'created_date',
		'created_user',
		'ip_user_updated',
),
)); ?>
