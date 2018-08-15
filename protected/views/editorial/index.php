<?php
/* @var $this ArticleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Member Articles',
);

$this->menu=array(
	array('label'=>'Create MemberArticle', 'url'=>array('create')),
	array('label'=>'Manage MemberArticle', 'url'=>array('admin')),
);
?>

<h1>Member Articles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
