<?php
$this->breadcrumbs=array(
	'Voyage Close Documents',
);

$this->menu=array(
array('label'=>'Create Voyage Close Document','url'=>array('create')),
array('label'=>'Manage Voyage Close Document','url'=>array('admin')),
);
?>
<div id="content">
<h2>Voyage Close Documents</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
