<?php
$this->breadcrumbs=array(
	'Mst Voyage Documents',
);

$this->menu=array(
array('label'=>'Create MstVoyageDocument','url'=>array('create')),
array('label'=>'Manage MstVoyageDocument','url'=>array('admin')),
);
?>
<div id="content">
<h2>Mst Voyage Documents</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
