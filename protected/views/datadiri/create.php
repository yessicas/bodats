<?php
$this->breadcrumbs=array(
	'Data Diri'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Data Diri','url'=>array('index')),
array('label'=>'Manage Data Diri','url'=>array('admin')),
);
?>

<div class="well">
<h4><?php echo Yii::t('strings','Add') ?><?php echo Yii::t('strings','Profile') ?> </h4>
<hr>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>