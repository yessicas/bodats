<?php
$this->breadcrumbs=array(
	'Crew Payroll Histories'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List CrewPayrollHistory','url'=>array('index')),
array('label'=>'Manage CrewPayrollHistory','url'=>array('admin')),
);
?>

<h1>Create CrewPayrollHistory</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>