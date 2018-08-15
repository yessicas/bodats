<?php
$this->breadcrumbs=array(
	'Vendors',
);

$this->menu=array(
array('label'=>'Create Vendor', 'url'=>array('custvend/vendcreate')),
 array('label'=>'Manage Vendor', 'url'=>array('custvend/vend')),
);
?>
<div id="content">
<h2>Vendors</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'../vendor/_view',
)); ?>
