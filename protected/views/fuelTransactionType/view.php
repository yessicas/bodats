<?php
$this->breadcrumbs=array(
	'Fuel Transaction Types'=>array('index'),
	$model->id_fuel_transaction_type,
);

$this->menu=array(
//array('label'=>'List FuelTransactionType','url'=>array('index')),
array('label'=>'Manage FuelTransactionType','url'=>array('master/masfuel')),
array('label'=>'Create FuelTransactionType','url'=>array('master/masfuelcreate')),
array('label'=>'View FuelTransactionType','url'=>array('view','id'=>$model->id_fuel_transaction_type),'active'=>true),
array('label'=>'Update FuelTransactionType','url'=>array('update','id'=>$model->id_fuel_transaction_type)),

array('label'=>'Delete FuelTransactionType','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_fuel_transaction_type),'confirm'=>'Are you sure you want to delete this item?')),

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

<h3>View Fuel Transaction Type<font color=#BD362F> #<?php echo $model->fuel_transaction_type; ?></font></h3>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_fuel_transaction_type',
		'fuel_transaction_type',
		'category',
),
)); ?>
