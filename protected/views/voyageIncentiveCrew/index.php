<?php
$this->breadcrumbs=array(
	'Voyage Incentive Crews',
);

$this->menu=array(
array('label'=>'Create VoyageIncentiveCrew','url'=>array('create')),
array('label'=>'Manage VoyageIncentiveCrew','url'=>array('admin')),
);
?>

<h1>Voyage Incentive Crews</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
