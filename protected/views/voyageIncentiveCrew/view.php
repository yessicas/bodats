<?php
$this->breadcrumbs=array(
	'Voyage Incentive Crews'=>array('index'),
	$model->id_voyage_incentive_crew,
);

$this->menu=array(
array('label'=>'List VoyageIncentiveCrew','url'=>array('index')),
array('label'=>'Create VoyageIncentiveCrew','url'=>array('create')),
array('label'=>'Update VoyageIncentiveCrew','url'=>array('update','id'=>$model->id_voyage_incentive_crew)),
array('label'=>'Delete VoyageIncentiveCrew','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_voyage_incentive_crew),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage VoyageIncentiveCrew','url'=>array('admin')),
);
?>

<h1>View VoyageIncentiveCrew #<?php echo $model->id_voyage_incentive_crew; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_voyage_incentive_crew',
		'id_voyage_incentive',
		'incentive_date',
		'type_incentive',
		'percentage',
		'amount',
		'created_date',
		'created_user',
		'ip_user_updated',
),
)); ?>
