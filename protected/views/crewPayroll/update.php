<?php
$this->breadcrumbs=array(
	'Crew Payrolls'=>array('index'),
	$model->id_crew_payroll=>array('view','id'=>$model->id_crew_payroll),
	'Update',
);

	$this->menu=array(
	array('label'=>'List CrewPayroll','url'=>array('index')),
	array('label'=>'Create CrewPayroll','url'=>array('create')),
	array('label'=>'View CrewPayroll','url'=>array('view','id'=>$model->id_crew_payroll)),
	array('label'=>'Manage CrewPayroll','url'=>array('admin')),
	);
	?>

	<h1>Update CrewPayroll <?php echo $model->id_crew_payroll; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>