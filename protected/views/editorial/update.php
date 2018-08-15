<?php
/* @var $this ArticleController */
/* @var $model MemberArticle */

$this->breadcrumbs=array(
	'Artikel',
	$model->Title=>array('view','id'=>$model->IDArticle,'c'=>$model->articlecode),
	'Update',
);

$this->menu=array(
	array('label'=>'List MemberArticle', 'url'=>array('index')),
	array('label'=>'Create MemberArticle', 'url'=>array('create')),
	array('label'=>'View MemberArticle', 'url'=>array('view', 'id'=>$model->IDArticle)),
	array('label'=>'Manage MemberArticle', 'url'=>array('admin')),
);
?>

<div class="well">
<h4>Update Artikel <?php echo $model->Title; ?></h4>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>