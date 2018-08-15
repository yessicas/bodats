<?php
$this->breadcrumbs=array(
	'Bank Accounts'=>array('index'),
	$model->id_bank_account,
);

$this->menu=array(
//array('label'=>'List BankAccount','url'=>array('index')),
array('label'=>'Manage BankAccount','url'=>array('admin')),
array('label'=>'Create BankAccount','url'=>array('create')),
array('label'=>'View BankAccount','url'=>array('view','id'=>$model->id_bank_account),'active'=>true),
array('label'=>'Update BankAccount','url'=>array('update','id'=>$model->id_bank_account)),

array('label'=>'Delete BankAccount','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_bank_account),'confirm'=>'Are you sure you want to delete this item?')),

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
<div id="content">
<h2>View BankAccount<font color=#BD362F> #<?php echo $model->id_bank_account; ?></font></h2>
<hr>
</div>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_bank_account',
		'BankName',
		'BranchAddress',
		'BankCity',
		'AccountName',
		'AccountNumber',
		//'Currency',
		array('label'=>'Currency',
				  'value'=>$model->curr->currency_type),
		//'id_currency',
),
)); ?>
