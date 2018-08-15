<?php
$this->breadcrumbs=array(
	'Po Categories'=>array('index'),
	$model->id_po_category=>array('view','id'=>$model->id_po_category),
	'Update',
);

	$this->menu=array(
	// array('label'=>'List PoCategory','url'=>array('index')),
	array('label'=>'Manage PO Category','url'=>array('master/maspo')),
	array('label'=>'Create PO Category','url'=>array('master/maspocreate')),
	array('label'=>'View PO Category','url'=>array('master/maspoview','id'=>$model->id_po_category)),
	array('label'=>'Update PO Category','url'=>array('master/maspoupdate','id'=>$model->id_po_category),'active'=>true),

array('label'=>'Delete PO Category','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_po_category),'confirm'=>'Are you sure you want to delete this item?')),

	
	);
	?>
<div id="content">
	<h2>Update PO Category<font color=#BD362F> <?php echo $model->id_po_category; ?></font></h2>
	<hr>
</div>
<?php echo $this->renderPartial('../PoCategory/_form',array('model'=>$model)); ?>