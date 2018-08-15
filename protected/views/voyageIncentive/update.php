<?php
$this->breadcrumbs=array(
	'Voyage Incentives'=>array('index'),
	$model->id_voyage_incentive=>array('view','id'=>$model->id_voyage_incentive),
	'Update',
);

	$this->menu=array(
	array('label'=>'List VoyageIncentive','url'=>array('index')),
	array('label'=>'Create VoyageIncentive','url'=>array('create')),
	array('label'=>'View VoyageIncentive','url'=>array('view','id'=>$model->id_voyage_incentive)),
	array('label'=>'Manage VoyageIncentive','url'=>array('admin')),
	);
	?>

	<h1>Update VoyageIncentive <?php echo $model->id_voyage_incentive; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>