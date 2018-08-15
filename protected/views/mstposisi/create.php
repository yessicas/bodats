<?php
$this->breadcrumbs=array(
	'Mst Posisis'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List MstPosisi','url'=>array('index')),
array('label'=>'Manage MstPosisi','url'=>array('admin')),
);
?>
<div class="well">
<h3><?php echo Yii::t('strings','Add') ?> <?php echo Yii::t('strings','Data Position') ?> <?php //echo $model->country_name; ?></h3>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>