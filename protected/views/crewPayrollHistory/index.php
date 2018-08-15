<?php
$this->breadcrumbs=array(
	'Crew Payroll Histories',
);

$this->menu=array(
array('label'=>'Create CrewPayrollHistory','url'=>array('create')),
array('label'=>'Manage CrewPayrollHistory','url'=>array('admin')),
);
?>

<h1>Crew Payroll Histories</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
