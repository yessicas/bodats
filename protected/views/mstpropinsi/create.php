<?php
$this->breadcrumbs=array(
	'Mst Propinsis'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List MstPropinsi','url'=>array('index')),
array('label'=>'Manage MstPropinsi','url'=>array('admin')),
);
?>

<h1>Create MstPropinsi</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>