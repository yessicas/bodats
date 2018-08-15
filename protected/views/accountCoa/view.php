<?php
$this->breadcrumbs=array(
	'Account COAs'=>array('index'),
	$model->id_account_coa,
);

$this->menu=array(
//array('label'=>'List AccountCoa','url'=>array('index')),
array('label'=>'Manage Account COA','url'=>array('admin')),
array('label'=>'Create Account COA','url'=>array('create')),
array('label'=>'View Account COA','url'=>array('view','id'=>$model->id_account_coa)),
array('label'=>'Update Account COA','url'=>array('update','id'=>$model->id_account_coa)),

array('label'=>'Delete Account COA','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_account_coa),'confirm'=>'Are you sure you want to delete this item?')),

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

<h3>View Account COA<font color=#BD362F> #<?php echo $model->account_name; ?></font></h3>


<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_account_coa',
		'account_name',
		'account_name_id',
		'id_account_coa_parent',
		'level',
),
)); ?>
