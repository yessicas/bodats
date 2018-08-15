<?php
	$this->breadcrumbs=array(
		'Numbering Fakturs'=>array('index'),
		'Create',
	);

	$this->menu=array(
	array('label'=>'List Numbering Faktur','url'=>array('admin')),
	array('label'=>'Create Numbering Faktur','url'=>array('create'), 'active'=>true),
	);
?>
	
<div id="content">
<h2>Create Numbering Faktur</h2>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>