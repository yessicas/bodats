<?php
$this->breadcrumbs=array(
	'Voyage Incentive Crews'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List VoyageIncentiveCrew','url'=>array('index')),
array('label'=>'Manage VoyageIncentiveCrew','url'=>array('admin')),
);
?>

<h1>Create VoyageIncentiveCrew</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>