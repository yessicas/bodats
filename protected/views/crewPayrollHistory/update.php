<?php
$this->breadcrumbs=array(
	'Crew Payroll Histories'=>array('index'),
	$model->id_crew_payroll_history=>array('view','id'=>$model->id_crew_payroll_history),
	'Update',
);

	$this->menu=array(
	array('label'=>'List CrewPayrollHistory','url'=>array('index')),
	array('label'=>'Create CrewPayrollHistory','url'=>array('create')),
	array('label'=>'View CrewPayrollHistory','url'=>array('view','id'=>$model->id_crew_payroll_history)),
	array('label'=>'Manage CrewPayrollHistory','url'=>array('admin')),
	);
	?>

	<h1>Update CrewPayrollHistory <?php echo $model->id_crew_payroll_history; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>