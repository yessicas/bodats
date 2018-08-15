<?php
$this->breadcrumbs=array(
	'Vessel Maintenance Plans'=>array('index'),
	$model->id_vessel_maintenance_plan,
);

$this->menu=array(
array('label'=>'Update Vessel Maintenance Plan','url'=>array('repair/updateplan','id'=>$model->id_vessel_maintenance_plan)),
array('label'=>'Create Vessel Maintenance Plan','url'=>array('repair/plancreate')),
array('label'=>'View Vessel Maintenance Plan','url'=>array('repair/viewplan','id'=>$model->id_vessel_maintenance_plan)),
array('label'=>'Manage Vessel Maintenance Plan','url'=>array('repair/plan')),
//array('label'=>'Delete MaintenancePlan','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_vessel_maintenance_plan),'confirm'=>'Are you sure you want to delete this item?')),
//array('label'=>'Delete VesselMaintenancePlan','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_vessel_maintenance_plan),'confirm'=>'Apakah anda yakin akan menghapus data ini?')),
//array('label'=>'Manage MaintenancePlan','url'=>array('admin')),
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
<h2>View Vessel Maintenance Plan   # <font color="#BD362F"><?php echo $model->MaintenanceName; ?></font></h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
//'type'=>'striped bordered condensed',
'attributes'=>array(
	//array('label'=>'Label','name'=>'attribute','value'=>'value'),
	/*
	array(
		'name' => 'hak_akses',
		'type' => 'raw',
		'value' => CHtml::encode($model->ubahAkses()),
		),
	*/
		//'id_vessel_maintenance_plan',
 		 array(   
                'name'=>'id_vessel',
                'value'=>$model->Vessel->VesselName,
                ),

		 array(   
                'name'=>'id_maintenance_type',
                'value'=>$model->idMaintenanceType->MaintenanceTypeName,
                ),
		//'id_maintenance_type',
		 
		//'id_vessel',
		'start_date',
		'end_date',
		'Duration',
		'Description',
		/*'RunningHour',
		'MaintenanceName',
		'created_date',
		'created_user',
		'ip_user_updated',
		*/
),
)); ?>
