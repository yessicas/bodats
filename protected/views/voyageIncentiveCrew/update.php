<?php
$this->breadcrumbs=array(
	'Voyage Incentive Crews'=>array('index'),
	$model->id_voyage_incentive_crew=>array('view','id'=>$model->id_voyage_incentive_crew),
	'Update',
);

	$this->menu=array(
	array('label'=>'List VoyageIncentiveCrew','url'=>array('index')),
	array('label'=>'Create VoyageIncentiveCrew','url'=>array('create')),
	array('label'=>'View VoyageIncentiveCrew','url'=>array('view','id'=>$model->id_voyage_incentive_crew)),
	array('label'=>'Manage VoyageIncentiveCrew','url'=>array('admin')),
	);
	?>

	<h1>Update VoyageIncentiveCrew <?php echo $model->id_voyage_incentive_crew; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>