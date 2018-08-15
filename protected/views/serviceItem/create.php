<?php
$this->breadcrumbs=array(
	'Service Items'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Service Item','url'=>array('admin')),
array('label'=>'Create Service Item','url'=>array('create'), 'active'=>true),
);
?>

<div id="content">
<h2>Create Service Item</h2>
<hr>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>