<?php
$this->breadcrumbs=array(
	'Setting Voyage Reports'=>array('index'),
	$model->id_setting_tax_report,
);

$this->menu=array(
//array('label'=>'List SettingVoyageReport','url'=>array('index')),
array('label'=>'Manage SettingVoyageReport','url'=>array('setting/voyage')),
array('label'=>'Create SettingVoyageReport','url'=>array('setting/voaygecreate')),
array('label'=>'View SettingVoyageReport','url'=>array('setting/voyageview','id'=>$model->id_setting_tax_report)),
array('label'=>'Update SettingVoyageReport','url'=>array('setting/voyageupdate','id'=>$model->id_setting_tax_report)),

array('label'=>'Delete SettingVoyageReport','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_setting_tax_report),'confirm'=>'Are you sure you want to delete this item?')),

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

<h3>View SettingVoyageReport<font color=#BD362F> #<?php echo $model->field_name; ?></font></h3>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_setting_tax_report',
		'field_name',
		'field_value',
),
)); ?>
