<?php
/* @var $this ArticleController */
/* @var $model MemberArticle */

$this->breadcrumbs=array(
	'Member Articles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MemberArticle', 'url'=>array('index')),
	array('label'=>'Manage MemberArticle', 'url'=>array('admin')),
);
?>

<div class="well">
<h4><?php echo Yii::t('strings','Post New Article') ?> </h4>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>