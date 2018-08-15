<?php
$this->breadcrumbs=array(
	'Mst Vessel Document Validities',
);

$this->menu=array(
array('label'=>'Create MstVesselDocumentValidity','url'=>array('create')),
array('label'=>'Manage MstVesselDocumentValidity','url'=>array('admin')),
);
?>
<div id="content">
<h2>Manage Vessel Document Validities</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
