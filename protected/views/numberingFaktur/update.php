<?php
$this->breadcrumbs=array(
	'Numbering Fakturs'=>array('index'),
	$model->id_numbering_faktur=>array('view','id'=>$model->id_numbering_faktur),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Numbering Faktur','url'=>array('admin')),
	//array('label'=>'Create Numbering Faktur','url'=>array('create')),
	array('label'=>'Update Numbering Faktur','url'=>array('update','id'=>$model->id_numbering_faktur), 'active'=>true),
	//array('label'=>'Manage Numbering Faktur','url'=>array('admin')),
	//array('label'=>'Update Numbering Faktur','url'=>array('update'), 'active'=>true),
	);
	?>

	<div id="content">
	<h2>Update Numbering Faktur <?php echo $model->id_numbering_faktur; ?></h2>
</div>
<?php echo $this->renderPartial('_form_update',array('model'=>$model)); ?>