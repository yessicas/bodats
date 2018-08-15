<?php
$this->breadcrumbs=array(
	'Forum Topics'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List ForumTopic','url'=>array('index')),
array('label'=>'Manage ForumTopic','url'=>array('admin')),
);
?>

<div class="well">
<h4> <?php echo Yii::t('strings','Post New Topics') ?> </h4>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>