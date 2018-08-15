<?php
$this->breadcrumbs=array(
	'Vendor Classifications',
);

$this->menu=array(
array('label'=>'Create VendorClassification','url'=>array('create')),
array('label'=>'Manage VendorClassification','url'=>array('admin')),
);
?>
<div id="content">
<h2>Vendor Classifications</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
