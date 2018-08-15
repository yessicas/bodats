<?php
$this->breadcrumbs=array(
	'Mst Vessel Document Validities'=>array('index'),
	$model->id_vessel_document_validity=>array('view','id'=>$model->id_vessel_document_validity),
	'Update',
);

	$this->menu=array(
	// array('label'=>'List MstVesselDocumentValidity','url'=>array('index')),
	array('label'=>'Manage VesselDocument Validity','url'=>array('master/valid')),
array('label'=>'Create VesselDocument Validity','url'=>array('master/validcreate')),
array('label'=>'View VesselDocument Validity','url'=>array('view','id'=>$model->id_vessel_document_validity)),
array('label'=>'Update VesselDocument Validity','url'=>array('update','id'=>$model->id_vessel_document_validity),'active'=>true),

array('label'=>'Delete Vessel Document Validity','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_vessel_document_validity),'confirm'=>'Are you sure you want to delete this item?')),

	);
	?>
<div id="content">
	<h2>Update Vessel Document Validity<font color=#BD362F> <?php echo $model->color; ?></font></h2>
	<hr>
</div>
<?php echo $this->renderPartial('../MstVesselDocumentValidity/_form',array('model'=>$model)); ?>