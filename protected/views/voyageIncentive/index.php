<?php
$this->breadcrumbs=array(
	'Voyage Incentives',
);

$this->menu=array(
array('label'=>'Create VoyageIncentive','url'=>array('create')),
array('label'=>'Manage VoyageIncentive','url'=>array('admin')),
);
?>

<h1>Voyage Incentives</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
