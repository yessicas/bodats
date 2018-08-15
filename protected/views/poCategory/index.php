<?php
$this->breadcrumbs=array(
	'PO Categories',
);

$this->menu=array(
array('label'=>'Create PO Category','url'=>array('create')),
array('label'=>'Manage PO Category','url'=>array('admin')),
);
?>
<div id="content">
<h2>PO Categories</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
