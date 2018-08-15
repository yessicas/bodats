<?php
$this->breadcrumbs=array(
	'Demurage Costs'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Voyage Closing','url'=>array('voyageorder/close_voyage')),	
array('label'=>'Create Demurage Cost','url'=>array('create/idvo/2'),'active'=>true),
array('label'=>'Manage Demurage Cost','url'=>array('admin')),
);
?>

<div id="content">
<h2>Create Demurage Cost</h2>
<hr>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>