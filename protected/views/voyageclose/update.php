<?php
$this->breadcrumbs=array(
	'Voyage Closes'=>array('index'),
	$model->id_voyage_close=>array('view','id'=>$model->id_voyage_close),
	'Update',
);

	$this->menu=array(
array('label'=>'Close Voyage Order','url'=>array('voyageorder/close_voyage')),
//array('label'=>'Create VoyageClose','url'=>array('create')),
array('label'=>'View Voyage Close','url'=>array('voyageclose/view','id'=>$model->id_voyage_order)),
array('label'=>'Update Voyage Close','url'=>array('voyageclose/update','id'=>$model->id_voyage_order)),
//array('label'=>'Delete VoyageClose','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_voyage_close),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<div id="content">
<h2>Update Voyage Close <?php //echo $model->id_voyage_close; ?></h2>
<hr>
</div>
<div class="alert alert-block alert-info">
<b><?php echo Yii::t('strings','Step 2') ?></b> :
<?php echo Yii::t('strings','Voyage Close Report') ?>
</div>

	

<?php echo $this->renderPartial('_form_update',array('model'=>$model,'modelvoyage'=>$modelvoyage)); ?>