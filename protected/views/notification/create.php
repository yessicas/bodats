<?php
$this->breadcrumbs=array(
	'Notifications'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Notification','url'=>array('index')),
array('label'=>'Manage Notification','url'=>array('admin')),
);
?>

<div class="well">
<h4>Create Notification</h4>
<hr>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>