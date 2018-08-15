<?php
$this->breadcrumbs=array(
	'Rfq Vendors',
);

$this->menu=array(
array('label'=>'Create RfqVendor','url'=>array('create')),
array('label'=>'Manage RfqVendor','url'=>array('admin')),
);
?>
<div id="content">
<h2>Rfq Vendors</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
