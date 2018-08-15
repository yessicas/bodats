<?php
$this->breadcrumbs=array(
	'Po Categories'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage PO Category','url'=>array('master/maspo')),
array('label'=>'Create PO Category','url'=>array('master/maspocreate')),

);
?>
<div id="content">
<h2>Create PO Category</h2>
<hr>
</div>


<?php echo $this->renderPartial('../PoCategory/_form', array('model'=>$model)); ?>