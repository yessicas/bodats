<?php
$this->breadcrumbs=array(
	'Standard Vessel Costs'=>array('index'),
	$model->id_standard_vessel_cost,
);

$this->menu=array(
array('label'=>'List StandardVesselCost','url'=>array('index')),
array('label'=>'Create StandardVesselCost','url'=>array('create')),
array('label'=>'Update StandardVesselCost','url'=>array('update','id'=>$model->id_standard_vessel_cost)),
array('label'=>'Delete StandardVesselCost','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_standard_vessel_cost),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage StandardVesselCost','url'=>array('admin')),
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
<h2>View StandardVesselCost #<?php echo $model->id_standard_vessel_cost; ?></h2>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_standard_vessel_cost',
		'id_vessel',
		'month',
		'year',
		'depreciation_cost',
		'crew_own_cost',
		'crew_subcont_cost',
		'insurance',
		'repair',
		'docking',
		'brokerage_fee',
		'others',
		'created_date',
		'created_user',
		'ip_user_updated',
),
)); ?>
