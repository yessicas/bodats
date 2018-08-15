<?php
$this->breadcrumbs=array(
	'Setting Quotation Reports',
);

$this->menu=array(
array('label'=>'Create Setting Quotation Report','url'=>array('create')),
array('label'=>'Manage Setting Quotation Report','url'=>array('admin')),
);
?>
<div id="content">
<h2>Setting Quotation Reports</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
