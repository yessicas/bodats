<?php
$this->breadcrumbs=array(
	'Job Categories'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List JobCategory','url'=>array('index')),
array('label'=>'Manage JobCategory','url'=>array('admin')),
);
?>

<div class="well">
<h4>Create JobCategory</h4>
<hr>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>