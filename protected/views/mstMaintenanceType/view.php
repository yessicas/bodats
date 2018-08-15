<?php
$this->breadcrumbs=array(
	'Mst Maintenance Types'=>array('index'),
	$model->id_maintenance_type,
);

$this->menu=array(
//array('label'=>'List MstMaintenanceType','url'=>array('index')),
array('label'=>'Create MstMaintenanceType','url'=>array('create')),
array('label'=>'Update MstMaintenanceType','url'=>array('update','id'=>$model->id_maintenance_type)),
array('label'=>'View MstMaintenanceType','url'=>array('view','id'=>$model->id_maintenance_type)),
array('label'=>'Delete MstMaintenanceType','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_maintenance_type),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage MstMaintenanceType','url'=>array('admin')),
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
<h2>View MstMaintenanceType<font color=#BD362F> #<?php echo $model->id_maintenance_type; ?></font></h2>
<hr>
</div>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_maintenance_type',
		'MaintenanceTypeName',
),
)); ?>
