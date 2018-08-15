<?php
$this->breadcrumbs=array(
	'Rfq Vendor Details',
);

$this->menu=array(
array('label'=>'Create RfqVendorDetail','url'=>array('create')),
array('label'=>'Manage RfqVendorDetail','url'=>array('admin')),
);
?>
<div id="content">
<h2>Rfq Vendor Details</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
