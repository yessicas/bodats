<?php
$this->breadcrumbs=array(
	'Numbering Faktur Allocations'=>array('index'),
	$model->id_numbering_faktur_allocation=>array('view','id'=>$model->id_numbering_faktur_allocation),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Faktur Allocation','url'=>array('admin')),
	array('label'=>'Create Faktur Allocation','url'=>array('create')),
	array('label'=>'Update Faktur Allocation','url'=>array('update','id'=>$model->id_numbering_faktur_allocation), 'active'=>true),
	);
	?>
	
<div id="content">
<h2>Update Numbering Faktur Allocation</h2>
</div>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>