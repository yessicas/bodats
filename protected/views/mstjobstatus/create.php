<?php
$this->breadcrumbs=array(
	'Mst Job Statuses'=>array('admin'),
	'Create',
);

$this->menu=array(
array('label'=>'List MstJobStatus','url'=>array('index')),
array('label'=>'Manage MstJobStatus','url'=>array('admin')),
);
?>

<div class="well">
<h3> <?php echo Yii::t('strings','Add') ?> Mst Job Status
<?php //echo $model->status; ?></h3>
<hr>
</div>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>