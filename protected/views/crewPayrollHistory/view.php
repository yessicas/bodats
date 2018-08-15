<?php
$this->breadcrumbs=array(
	'Crew Payroll Histories'=>array('index'),
	$model->id_crew_payroll_history,
);

$this->menu=array(
array('label'=>'List CrewPayrollHistory','url'=>array('index')),
array('label'=>'Create CrewPayrollHistory','url'=>array('create')),
array('label'=>'Update CrewPayrollHistory','url'=>array('update','id'=>$model->id_crew_payroll_history)),
array('label'=>'Delete CrewPayrollHistory','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_crew_payroll_history),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage CrewPayrollHistory','url'=>array('admin')),
);
?>

<h1>View CrewPayrollHistory #<?php echo $model->id_crew_payroll_history; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_crew_payroll_history',
		'CrewId',
		'id_payroll_item',
		'amount',
		'effective_date',
		'legal_document',
		'notes',
		'id_currency',
		'created_date',
		'created_user',
		'ip_user_updated',
),
)); ?>
