<?php
$this->breadcrumbs=array(
	'Invoice Voyages',
);

$this->menu=array(
array('label'=>'Create InvoiceVoyage','url'=>array('create')),
array('label'=>'Manage InvoiceVoyage','url'=>array('admin')),
);
?>
<div id="content">
<h2>Invoice Voyages</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
