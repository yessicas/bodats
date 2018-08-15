<?php
$this->breadcrumbs=array(
	'Crew Payroll Monthlies'=>array('index'),
	$model->id_crew_payroll_monthly,
);

$this->menu=array(
array('label'=>'List CrewPayrollMonthly','url'=>array('index')),
array('label'=>'Create CrewPayrollMonthly','url'=>array('create')),
array('label'=>'Update CrewPayrollMonthly','url'=>array('update','id'=>$model->id_crew_payroll_monthly)),
array('label'=>'Delete CrewPayrollMonthly','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_crew_payroll_monthly),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage CrewPayrollMonthly','url'=>array('admin')),
);
?>

<h1>View CrewPayrollMonthly #<?php echo $model->id_crew_payroll_monthly; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_crew_payroll_monthly',
		'month',
		'year',
		'CrewId',
		'id_payroll_item',
		'amount',
		'transfer_date',
		'transfer_type',
		'id_currency',
		'created_date',
		'created_user',
		'ip_user_updated',
),
)); ?>
