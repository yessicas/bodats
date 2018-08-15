<?php
$this->breadcrumbs=array(
	'Crew Payrolls'=>array('index'),
	$model->id_crew_payroll,
);

$this->menu=array(
array('label'=>'List CrewPayroll','url'=>array('index')),
array('label'=>'Create CrewPayroll','url'=>array('create')),
array('label'=>'Update CrewPayroll','url'=>array('update','id'=>$model->id_crew_payroll)),
array('label'=>'Delete CrewPayroll','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_crew_payroll),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage CrewPayroll','url'=>array('admin')),
);
?>

<h1>View CrewPayroll #<?php echo $model->id_crew_payroll; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_crew_payroll',
		'id_crew_payroll_history',
		'CrewId',
		'id_payroll_item',
		'amount',
		'effective_date',
		'legal_document',
		'id_currency',
		'created_date',
		'created_user',
		'ip_user_updated',
),
)); ?>
