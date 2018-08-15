<?php
$this->breadcrumbs=array(
	'Mst Job Statuses'=>array('admin'),
	$model->id_mst_job_status,
);

$this->menu=array(
array('label'=>'List MstJobStatus','url'=>array('index')),
array('label'=>'Create MstJobStatus','url'=>array('create')),
array('label'=>'Update MstJobStatus','url'=>array('update','id'=>$model->id_mst_job_status)),
array('label'=>'Delete MstJobStatus','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_mst_job_status),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage MstJobStatus','url'=>array('admin')),
);
?>

<div class="well">
<h3>Mst Job Status
<?php echo $model->status; ?></h3>
<hr>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_mst_job_status',
		'status',
		'keterangan',
		'is_active',
),
)); ?>
