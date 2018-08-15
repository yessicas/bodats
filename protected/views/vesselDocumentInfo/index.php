<?php
$this->breadcrumbs=array(
	'Vessel Document Infos',
);

$this->menu=array(
array('label'=>'Create VesselDocumentInfo','url'=>array('create')),
array('label'=>'Manage VesselDocumentInfo','url'=>array('admin')),
);
?>
<div id="content">
<h2>Vessel Document Infos</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
