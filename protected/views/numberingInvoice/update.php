<?php
$this->breadcrumbs=array(
	'Numbering Invoices'=>array('index'),
	$model->id_numbering=>array('view','id'=>$model->id_numbering),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Numbering Invoice','url'=>array('admin')),
	array('label'=>'Create Numbering Invoice','url'=>array('create')),
	array('label'=>'Update Numbering Invoice','url'=>array('update'), 'active'=>true),
	);
	?>

	<h2>Update NumberingInvoice <?php echo $model->id_numbering; ?></h2>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>