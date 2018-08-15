<?php
$this->breadcrumbs=array(
	'Mst Job Statuses'=>array('admin'),
	$model->id_mst_job_status=>array('view','id'=>$model->id_mst_job_status),
	'Update',
);

	$this->menu=array(
	array('label'=>'List MstJobStatus','url'=>array('index')),
	array('label'=>'Create MstJobStatus','url'=>array('create')),
	array('label'=>'View MstJobStatus','url'=>array('view','id'=>$model->id_mst_job_status)),
	array('label'=>'Manage MstJobStatus','url'=>array('admin')),
	);
	?>

<div class="well">
<h3> <?php echo Yii::t('strings','Update') ?> Mst Job Status
<?php echo $model->status; ?></h3>
<hr>
</div>


<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>