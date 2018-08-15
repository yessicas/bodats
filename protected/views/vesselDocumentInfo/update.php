<?php
$this->breadcrumbs=array(
	'Vessel Document Infos'=>array('index'),
	$model->id_vessel_document_info=>array('view','id'=>$model->id_vessel_document_info),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Vessel Document Info','url'=>array('index')),
	array('label'=>'Create Vessel Document Info','url'=>array('create')),
	array('label'=>'View Vessel Document Info','url'=>array('view','id'=>$model->id_vessel_document_info)),
	array('label'=>'Manage Vessel Document Info','url'=>array('admin')),
	);
	?>
<!-- <div id="content"> !---->
	<h4>Update Vessel Document Info<font color=#BD362F> <?php echo $model->id_vessel_document_info; ?></font></h4>
	<hr>
<?php echo $this->renderPartial('../VesselDocumentInfo/_form',array('model'=>$model)); ?>