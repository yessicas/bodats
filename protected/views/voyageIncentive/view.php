<?php
$this->breadcrumbs=array(
	'Voyage Incentives'=>array('index'),
	$model->id_voyage_incentive,
);

$this->menu=array(
array('label'=>'List VoyageIncentive','url'=>array('index')),
array('label'=>'Create VoyageIncentive','url'=>array('create')),
array('label'=>'Update VoyageIncentive','url'=>array('update','id'=>$model->id_voyage_incentive)),
array('label'=>'Delete VoyageIncentive','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_voyage_incentive),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage VoyageIncentive','url'=>array('admin')),
);
?>

<h1>View VoyageIncentive #<?php echo $model->id_voyage_incentive; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_voyage_incentive',
		'id_voyage_order',
		'incentive_date',
		'type_incentive',
		'amount',
		'created_date',
		'created_user',
		'ip_user_updated',
),
)); ?>
