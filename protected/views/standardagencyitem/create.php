<?php
$this->breadcrumbs=array(
	'Standard Agency Items'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Detail Standard Agency','url'=>array('standardagencyitem/viewdetail','id'=>$_GET['id'])),
array('label'=>'Add Detail Standard Agency','url'=>array('Standardagencyitem/create','id'=>$_GET['id'])),
);
?>
<div id="content">
<h2>Add Detail Item - Standard Agency </h2>
<hr>
</div>


<?php echo $this->renderPartial('_form', array('model'=>$model,'modelAgency'=>$modelAgency)); ?>