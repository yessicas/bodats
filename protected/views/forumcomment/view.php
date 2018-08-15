<?php
$this->breadcrumbs=array(
	'Forum Comments'=>array('index'),
	$model->id_forum_comment,
);

$this->menu=array(
array('label'=>'List ForumComment','url'=>array('index')),
array('label'=>'Create ForumComment','url'=>array('create')),
array('label'=>'Update ForumComment','url'=>array('update','id'=>$model->id_forum_comment)),
array('label'=>'Delete ForumComment','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_forum_comment),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage ForumComment','url'=>array('admin')),
);
?>

<h1>View ForumComment #<?php echo $model->id_forum_comment; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_forum_comment',
		'id_forum_topic',
		'comment',
		'userid',
		'update_date',
		'ip_address',
),
)); ?>
