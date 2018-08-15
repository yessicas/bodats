<?php
$this->breadcrumbs=array(
	'Crew Payroll Monthlies'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List CrewPayrollMonthly','url'=>array('index')),
array('label'=>'Manage CrewPayrollMonthly','url'=>array('admin')),
);
?>

<h1>Create CrewPayrollMonthly</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>