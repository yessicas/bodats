<?php
$this->breadcrumbs=array(
	'Standard Vessel Brokerages'=>array('index'),
	$model->id_standard_vessel_brokerage,
);

$this->menu=array(
array('label'=>'List StandardVesselBrokerage','url'=>array('index')),
array('label'=>'Create StandardVesselBrokerage','url'=>array('create')),
array('label'=>'Update StandardVesselBrokerage','url'=>array('update','id'=>$model->id_standard_vessel_brokerage)),
array('label'=>'Delete StandardVesselBrokerage','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_standard_vessel_brokerage),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage StandardVesselBrokerage','url'=>array('admin')),
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
<h2>View StandardVesselBrokerage #<?php echo $model->id_standard_vessel_brokerage; ?></h2>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_standard_vessel_brokerage',
		'id_standard_vessel_cost',
		'id_brokerage_item',
		'amount',
		'id_currency',
		'description',
		'created_date',
		'created_user',
		'ip_user_updated',
),
)); ?>
