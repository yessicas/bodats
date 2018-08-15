<?php
$this->breadcrumbs=array(
	'Vessel Insurance Accruals'=>array('index'),
	$model->id_vessel_insurance_accrual,
);

$this->menu=array(
array('label'=>'List Vessel Insurance Accrual','url'=>array('index')),
array('label'=>'Create Vessel Insurance Accrual','url'=>array('create')),
array('label'=>'Update Vessel Insurance Accrual','url'=>array('update','id'=>$model->id_vessel_insurance_accrual)),
array('label'=>'Delete Vessel Insurance Accrual','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_vessel_insurance_accrual),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Vessel Insurance Accrual','url'=>array('admin')),
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
<h2>View Vessel Insurance Accrual #<?php echo $model->id_vessel_insurance_accrual; ?></h2>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_vessel_insurance_accrual',
		'id_vessel',
		'year',
		'amount',
		'created_date',
		'created_user',
		'ip_user_updated',
),
)); ?>
