<?php
$this->breadcrumbs=array(
	'Mst Debit Note Categories',
);

$this->menu=array(
array('label'=>'Create MstDebitNoteCategory','url'=>array('create')),
array('label'=>'Manage MstDebitNoteCategory','url'=>array('admin')),
);
?>
<div id="content">
<h2>Mst Debit Note Categories</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
