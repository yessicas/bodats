<?php
$this->breadcrumbs=array(
	'Voyage Closes'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Close Voyage Order','url'=>array('voyageorder/close_voyage')),
array('label'=>'Create Voyage Close','url'=>array('voyageclose/create','id'=>$_GET['id'])),
);
?>
<div id="content">
<h2>Create Voyage Close</h2>
<hr>
</div>
<div class="alert alert-block alert-info">
<b><?php echo Yii::t('strings','Step 2') ?></b> :
<?php echo Yii::t('strings','Voyage Close Report') ?>
</div>


<?php echo $this->renderPartial('_form_report', array('model'=>$model,'modelvoyage'=>$modelvoyage)); ?>