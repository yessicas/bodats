<?php
$this->breadcrumbs=array(
	'Setting Generals'=>array('index'),
	$model->id_setting_general,
);

$this->menu=array(
	//array('label'=>'List SettingGeneral','url'=>array('index')),
	array('label'=>'Manage SettingGeneral','url'=>array('setting/general')),
	array('label'=>'Create SettingGeneral','url'=>array('setting/generalcreate')),
	array('label'=>'View SettingGeneral','url'=>array('setting/generalview','id'=>$model->id_setting_general)),
	array('label'=>'Update SettingGeneral','url'=>array('setting/generalupdate','id'=>$model->id_setting_general)),
	array('label'=>'Delete SettingGeneral','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_setting_general),'confirm'=>'Are you sure you want to delete this item?')),
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

<h4>View Setting General<font color=#BD362F> #<?php echo $model->field_name; ?></font></h4>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_setting_general',
		'field_name',
		'field_value',
),
)); ?>
