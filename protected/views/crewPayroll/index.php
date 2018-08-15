<?php
$this->breadcrumbs=array(
	'Crew Payrolls',
);

$this->menu=array(
array('label'=>'Create CrewPayroll','url'=>array('create')),
array('label'=>'Manage CrewPayroll','url'=>array('admin')),
);
?>

<h1>Crew Payrolls</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
