<?php
$this->breadcrumbs=array(
	'Customer Bank Accs'=>array('index'),
	$model->id_customer_bank_acc,
);

$this->menu=array(
//array('label'=>'List CustomerBankAcc','url'=>array('index')),
array('label'=>'Manage CustomerBankAcc','url'=>array('admin')),
array('label'=>'Create CustomerBankAcc','url'=>array('create')),
array('label'=>'View CustomerBankAcc','url'=>array('view','id'=>$model->id_customer_bank_acc)),
array('label'=>'Update CustomerBankAcc','url'=>array('update','id'=>$model->id_customer_bank_acc)),

array('label'=>'Delete CustomerBankAcc','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_customer_bank_acc),'confirm'=>'Are you sure you want to delete this item?')),

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

<h3>View Customer Bank Acc<font color=#BD362F> #<?php echo $model->AccountName; ?></font></h3>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_customer_bank_acc',
		'id_customer',
		'BankName',
		'BranchAddress',
		'BankCity',
		'AccountName',
		'AccountNumber',
		array('label'=>'Currency',
				  'value'=>$model->cur->currency),
		//'id_currency',
),
)); ?>
