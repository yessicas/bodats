<?php
$this->breadcrumbs=array(
	'Voyage Incentives'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List VoyageIncentive','url'=>array('index')),
array('label'=>'Manage VoyageIncentive','url'=>array('admin')),
);
?>

<h1>Create VoyageIncentive</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>