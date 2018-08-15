<?php
$this->breadcrumbs=array(
	'Crew Payroll Monthlies'=>array('index'),
	$model->id_crew_payroll_monthly=>array('view','id'=>$model->id_crew_payroll_monthly),
	'Update',
);

	$this->menu=array(
	array('label'=>'List CrewPayrollMonthly','url'=>array('index')),
	array('label'=>'Create CrewPayrollMonthly','url'=>array('create')),
	array('label'=>'View CrewPayrollMonthly','url'=>array('view','id'=>$model->id_crew_payroll_monthly)),
	array('label'=>'Manage CrewPayrollMonthly','url'=>array('admin')),
	);
	?>

	<h1>Update CrewPayrollMonthly <?php echo $model->id_crew_payroll_monthly; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>