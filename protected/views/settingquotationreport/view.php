<?php
$this->breadcrumbs=array(
	'Setting Quotation Reports'=>array('index'),
	$model->id_setting_quotation_report,
);

$this->menu=array(
//array('label'=>'List SettingQuotationReport','url'=>array('index')),
array('label'=>'Manage Setting Quotation Report','url'=>array('setting/quot')),
array('label'=>'Create Setting Quotation Report','url'=>array('setting/quotcreate')),
array('label'=>'View Setting Quotation Report','url'=>array('setting/quotview','id'=>$model->id_setting_quotation_report)),
array('label'=>'Update Setting Quotation Report','url'=>array('setting/quotupdate','id'=>$model->id_setting_quotation_report)),
array('label'=>'Delete Setting Quotation Report','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_setting_quotation_report),'confirm'=>'Are you sure you want to delete this item?')),

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
<h2>View Setting Quotation Report<font color=#BD362F> #<?php echo $model->id_setting_quotation_report; ?></font></h2>
<hr>
</div>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_setting_quotation_report',
		'field_name',
		'fiel_value',
),
)); ?>
