<?php
$this->breadcrumbs=array(
	'Payroll Items'=>array('index'),
	$model->id_payroll_item,
);

$this->menu=array(
//array('label'=>'List Payroll Item','url'=>array('index')),
array('label'=>'Manage Payroll Item','url'=>array('master/masrol')),
array('label'=>'Create Payroll Item','url'=>array('master/masrolcreate')),
array('label'=>'View Payroll Item','url'=>array('view','id'=>$model->id_payroll_item),'active'=>true),
array('label'=>'Update Payroll Item','url'=>array('update','id'=>$model->id_payroll_item)),

array('label'=>'Delete Payroll Item','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_payroll_item),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<?php
if(Yii::app()->user->hasFlash('success')):?>

<div class = "animated flash">
	<?php
    $this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true,
    'fade' => true,
    'closeText' => '&times;', // false equals no close link
    'alerts' => array( // configurations per alert type
        // success, info, warning, error or danger
        'success' => array('closeText' => '&times;'), 

    ),
	));
	?>
</div>

<?php endif; ?>


<h3>View Payroll Item <font color=#BD362F> #<?php echo $model->payroll_item; ?></font></h3>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_payroll_item',
		'payroll_item',
		array(

		'label'=>'Is Active',
		//'value'=>$model->Status=='1' ? 'Used' : 'Unused',  
		'value'=>PayrollItem::model()->status($model->is_active),  

		),
		//'is_active',
		'description',
),
)); ?>
