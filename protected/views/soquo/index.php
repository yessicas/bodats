<?php
$this->breadcrumbs=array(
	'Quotations',
);

$this->menu=array(
array('label'=>'Create Quotation','url'=>array('create')),
array('label'=>'Manage Quotation','url'=>array('admin')),
);
?>
<div id="content">
<h2>Quotations</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
