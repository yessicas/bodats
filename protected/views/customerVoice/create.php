<?php
$this->breadcrumbs=array(
	'Customer Voices'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Customer Voice','url'=>array('admin')),
array('label'=>'Create Customer Voice','url'=>array('create')),

);
?>
<div id="content">
<h2>Add Customer Voice</h2>
<hr>
</div>

<?php echo $this->renderPartial('../CustomerVoice/_form', array('model'=>$model)); ?>