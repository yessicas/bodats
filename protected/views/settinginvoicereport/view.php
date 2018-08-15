<?php
$this->breadcrumbs=array(
	'Setting Invoice Reports'=>array('index'),
	$model->id_setting_quotation_report,
);

$this->menu=array(
//array('label'=>'List SettingInvoiceReport','url'=>array('index')),
	array('label'=>'Manage Setting Invoice Report','url'=>array('setting/invo')),
	array('label'=>'Create Setting Invoice Report','url'=>array('setting/invocreate')),
	array('label'=>'View Setting Invoice Report','url'=>array('setting/invoview','id'=>$model->id_setting_quotation_report)),
	array('label'=>'Update Setting Invoice Report','url'=>array('setting/invoupdate','id'=>$model->id_setting_quotation_report)),

array('label'=>'Delete Setting Invoice Report','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_setting_quotation_report),'confirm'=>'Are you sure you want to delete this item?')),

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

<h3>View Setting Invoice Report<font color=#BD362F> #<?php echo $model->id_setting_quotation_report; ?></font></h3>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_setting_quotation_report',
		'field_name',
		'field_value',
),
)); ?>
