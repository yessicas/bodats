<?php
$this->breadcrumbs=array(
	'Friendships'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Friendship','url'=>array('index')),
array('label'=>'Manage Friendship','url'=>array('admin')),
);
?>

<div class="well">
<h4>Create Friendship</h4>
<hr>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>