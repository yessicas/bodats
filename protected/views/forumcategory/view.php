<?php
$this->breadcrumbs=array(
	'Forum Categories'=>array('index'),
	$model->id_forum_category,
);

$this->menu=array(
array('label'=>'List ForumCategory','url'=>array('index')),
array('label'=>'Create ForumCategory','url'=>array('create')),
array('label'=>'Update ForumCategory','url'=>array('update','id'=>$model->id_forum_category)),
array('label'=>'Delete ForumCategory','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_forum_category),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage ForumCategory','url'=>array('admin')),
);
?>

<?php if(Yii::app()->user->hasFlash('success')):?>
<div class = "animated flash">
	<?
    $this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true,
    'fade' => true,
    'closeText' => '&times;', // false equals no close link
    'alerts' => array( // configurations per alert type
        // success, info, warning, error or danger
        'success' => array('closeText' => '&times;'), 

    ),
));
    ?>
</div>
<?php endif; ?>

<div class="well">
<h3>Data Category
<?php echo $model->forum_category; ?></h3>
<hr>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_forum_category',
		'forum_category',
),
)); ?>
