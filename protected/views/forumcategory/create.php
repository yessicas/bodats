<?php
$this->breadcrumbs=array(
	'Forum Categories'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List ForumCategory','url'=>array('index')),
array('label'=>'Manage ForumCategory','url'=>array('admin')),
);
?>

<div class="well">
<h4>Tambah Category </h4>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>