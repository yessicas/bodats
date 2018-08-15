<?php
$this->breadcrumbs=array(
	'Crew Payroll Monthlies',
);

$this->menu=array(
array('label'=>'Create CrewPayrollMonthly','url'=>array('create')),
array('label'=>'Manage CrewPayrollMonthly','url'=>array('admin')),
);
?>

<h1>Crew Payroll Monthlies</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
