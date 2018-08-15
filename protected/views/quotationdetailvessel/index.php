<?php
$this->breadcrumbs=array(
	'Quotation Detail Vessels',
);

$this->menu=array(
array('label'=>'Create QuotationDetailVessel','url'=>array('create')),
array('label'=>'Manage QuotationDetailVessel','url'=>array('admin')),
);
?>
<div id="content">
<h2>Quotation Detail Vessels</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
