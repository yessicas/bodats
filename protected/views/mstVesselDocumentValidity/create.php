<?php
$this->breadcrumbs=array(
	'Mst Vessel Document Validities'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Vessel Document Validity','url'=>array('master/valid')),
array('label'=>'Create Vessel Document Validity','url'=>array('master/validcreate')),

);
?>
<div id="content">
<h2>Create Vessel Document Validity</h2>
<hr>
</div>


<?php echo $this->renderPartial('../MstVesselDocumentValidity/_form', array('model'=>$model)); ?>