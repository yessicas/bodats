<?php
$this->breadcrumbs=array(
	'Setting Spal Reports'=>array('index'),
	$model->id_setting_spal_report,
);

$this->menu=array(
//array('label'=>'List Setting SPAL Report','url'=>array('index')),
array('label'=>'Manage Setting SPAL Report','url'=>array('admin')),
array('label'=>'Create Setting SPAL Report','url'=>array('create')),
array('label'=>'View Setting SPAL Report','url'=>array('view','id'=>$model->id_setting_spal_report)),
array('label'=>'Update Setting SPAL Report','url'=>array('update','id'=>$model->id_setting_spal_report)),

array('label'=>'Delete Setting SPAL Report','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_setting_spal_report),'confirm'=>'Are you sure you want to delete this item?')),

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

<h4>View Setting SPAL Report<font color=#BD362F> # <?php echo $model->field_name; ?></font></h4>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_setting_spal_report',
		'field_name',
		'field_value',
),
)); ?>
