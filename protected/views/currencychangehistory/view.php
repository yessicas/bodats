<?php
$this->breadcrumbs=array(
	'Currency Change Histories'=>array('index'),
	$model->id_currency_change_hist,
);

$this->menu=array(
array('label'=>'List CurrencyChangeHistory','url'=>array('index')),
array('label'=>'Create CurrencyChangeHistory','url'=>array('create')),
array('label'=>'Update CurrencyChangeHistory','url'=>array('update','id'=>$model->id_currency_change_hist)),
array('label'=>'Delete CurrencyChangeHistory','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_currency_change_hist),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage CurrencyChangeHistory','url'=>array('admin')),
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
<h2>View CurrencyChangeHistory #<?php echo $model->id_currency_change_hist; ?></h2>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_currency_change_hist',
		'id_currency',
		'change_rate',
		'created_date',
		'created_user',
		'ip_user_updated',
),
)); ?>
