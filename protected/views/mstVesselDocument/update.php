<?php
$this->breadcrumbs=array(
	'Mst Vessel Documents'=>array('index'),
	$model->id_vessel_document=>array('view','id'=>$model->id_vessel_document),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Mst Vessel Document','url'=>array('index')),
	array('label'=>'Create Mst Vessel Document','url'=>array('create')),
	array('label'=>'View Mst Vessel Document','url'=>array('view','id'=>$model->id_vessel_document)),
	array('label'=>'Manage Mst Vessel Document','url'=>array('admin')),
	);
	?>

<!--- <div id="content"> !---->

	<h3>Update Vessel Document<font color=#BD362F> 
		<br><?php echo $model->VesselDocumentName; ?></font></h3>
	<hr>

<?php echo $this->renderPartial('../MstVesselDocument/_form',array('model'=>$model)); ?>