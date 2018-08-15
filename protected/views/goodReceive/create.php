<?php
$this->breadcrumbs=array(
	'Good Receives'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List GoodReceive','url'=>array('index')),
array('label'=>'Manage GoodReceive','url'=>array('admin')),
);
?>

<div id="content">
<h2>Create Good Receive</h2>
</div>
<hr>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>