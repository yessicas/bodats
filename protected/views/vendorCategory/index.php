<?php
$this->breadcrumbs=array(
	'Vendor Categories',
);

$this->menu=array(
array('label'=>'Create VendorCategory','url'=>array('create')),
array('label'=>'Manage VendorCategory','url'=>array('admin')),
);
?>
<div id="content">
<h2>Vendor Categories</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
